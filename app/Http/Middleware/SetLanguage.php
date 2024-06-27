<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use PulkitJalan\GeoIP\Facades\GeoIP;
use Jenssegers\Agent\Agent;
use Request;

class SetLanguage
{
    public static function getLocale()
    {
        $uri = Request::path();
        $segmentsURI = explode('/', $uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('settings.languageCodes'))) {
            if ($segmentsURI[0] !== config('settings.mainLanguage')) {
                return $segmentsURI[0];
            }
        }

        return null;
    }

    public static function getLocaleByCountryCode($countryCode)
    {
        if (in_array(strtolower($countryCode), config('settings.languageCodes'))) {
            return strtolower($countryCode);
        } else {
            return config('settings.mainLanguage');
        }
    }

    public function handle($request, Closure $next)
    {
        if ($request->is('admin*') OR $request->is('admin')) {
            return $next($request);
        }

        $setting = Setting::getSettings($_SERVER['HTTP_HOST']);
        $prefixCurrent = self::getLocale();
        $languages = config('settings.languages');

        if (!$prefixCurrent) {
            $prefixCurrent = config('settings.mainLanguage');
        }

        // Check if the request is from a bot
        $agent = new Agent();
        if ($agent->isRobot()) {
            App::setLocale(self::getLanguageFromRequest($request->getRequestUri()));
            return $next($request);
        }

        if (!Session::has('language')) {

            if ($setting->determine_language_by == 'ip') {
                $prefixByCountryUser = $this->getUserLanguageByIP($request->ip());
            } elseif ($setting->determine_language_by == 'browser') {
                $prefixByCountryUser = $this->getUserLanguageByBrowser();
            } else {
                $prefixByCountryUser = $prefixCurrent;
            }

            if ($prefixByCountryUser == $prefixCurrent || isset($languages[$prefixByCountryUser])) {
                $language = $prefixByCountryUser;
            } else {
                $language = $prefixCurrent;
            }

            $url = '/' . self::parseRequestUri($language, $request->getRequestUri());
            App::setLocale($language);
            Session::put('language', $language);

            if (rtrim($url, '/') != $request->getRequestUri()) {
                return response()->redirectTo($url, 301);
            }
        } else {
            Session::put('language', $prefixCurrent);
            App::setLocale($prefixCurrent);
        }

        return $next($request);
    }

    private function getUserLanguageByIP($ip)
    {
        $setip = GeoIP::setIp($ip);
        $countryCode = GeoIP::getCountryCode($setip);
        return $this->getLocaleByCountryCode($countryCode);
    }

    private function getUserLanguageByBrowser()
    {
        $browserLanguages = $this->getBrowserLanguages();
        $settings = config('settings');

        if (!empty($browserLanguages)) {
            foreach ($browserLanguages as $lang) {
                if (isset($settings['languages'][$lang]['code'])) {
                    return $settings['languages'][$lang]['code'];
                }
            }
        }

        return config('settings.mainLanguage');
    }

    private function getBrowserLanguages()
    {
        $browserLanguages = [];

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $acceptedLanguages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($acceptedLanguages as $lang) {
                $langParts = explode(';', $lang);
                $browserLanguages[] = strtolower(trim($langParts[0]));
            }
        }

        return $browserLanguages;
    }

    public static function getLanguageFromRequest($url)
    {
        $array = explode('/', $url);

        foreach ($array as $value){
            if(in_array($value, config('settings.languageCodes'))){
                return $value;
            }
        }

        return config('settings.mainLanguage');
    }

    public static function parseRequestUri($prefix, $url)
    {
        $array = explode('/', $url);

        if ($prefix != config('settings.mainLanguage')) {
            $url = [$prefix];
        } else {
            $url = [];
        }

        if ($array) {
            foreach ($array as $value) {
                if (!in_array($value, config('settings.languageCodes'))) {
                    $url[] = $value;
                }
            }
        }

        $url = implode('/', $url);
        $url = str_replace('//', '/', $url);
        return $url;
    }
}
