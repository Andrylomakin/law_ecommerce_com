<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PulkitJalan\GeoIP\Facades\GeoIP;
use Request;

class SetLanguage
{

    public static function getLocale()
    {
        // Получаем текущий URI запроса
        $uri = Request::path();

        // Разбиваем URI на отдельные сегменты
        $segmentsURI = explode('/', $uri);
        // Проверяем наличие метки языка среди доступных языков
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('settings.languageCodes'))) {
            // Если метка языка не является основным языком, возвращаем ее
            if ($segmentsURI[0] !== config('settings.mainLanguage')) {
                return $segmentsURI[0];
            }
        }

        // Если метка языка отсутствует или является основным языком, возвращаем null
        return null;
    }

    public static function getLocaleByCountryCode($countryCode)
    {
        if(in_array(strtolower($countryCode), config('settings.languageCodes'))){
            return strtolower($countryCode);
        }else{
            return config('settings.mainLanguage');
        }
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */

    public function handle($request, Closure $next)
    {
        $prefixCurrent = SetLanguage::getLocale();
        $languages = config('settings.languages');
        if (!$prefixCurrent) {
            $prefixCurrent = config('settings.mainLanguage');
        }
        if (!Session::has('language')) {
            // Если сессии нет
            $prefixByCountryUser = $this->getUserLanguageByIP($request->ip());
            if ($prefixByCountryUser == $prefixCurrent) {
                $language = $prefixByCountryUser;
            }elseif (isset($languages[$prefixCurrent])) {
                $language = $prefixCurrent;
            }else{
                $language = $prefixCurrent;
            }

            App::setLocale($language);
            $url = '/' . self::parseRequestUri($language, $request->getRequestUri());
            Session::put('language', $language);
            Redirect::to($url, 301);
        } else {
            Session::put('language', $prefixCurrent);
            App::setLocale($prefixCurrent);
        }

        return $next($request);
    }

    // Получаем язык пользователя по IP
    private function getUserLanguageByIP($ip)
    {
        $setting = Setting::getSettings($_SERVER['HTTP_HOST']);
        if(isset($setting->determine_by_ip_language)){
            if(!empty($setting->determine_by_ip_language) AND $ip){
                $setip = GeoIP::setIp($ip);
                $countryCode = GeoIP::getCountryCode($setip);
                return $this->getLocaleByCountryCode($countryCode);
            }else{
                return config('settings.mainLanguage');
            }
        }else{
            if($ip){
                $setip = GeoIP::setIp($ip);
                $countryCode = GeoIP::getCountryCode($setip);
                return $this->getLocaleByCountryCode($countryCode);
            }else{
                return config('settings.mainLanguage');
            }
        }
    }

    // Берем ссылку без домена и ищем языковый префикс, удаляем его и добавляем новый
    public static function parseRequestUri($prefix, $url)
    {
        $array = explode('/', $url);

        if($prefix != config('settings.mainLanguage')){
            $url = [$prefix];
        }else{
            $url = [];
        }

        if($array){
            foreach ($array as $value){
                if(!in_array($value, config('settings.languageCodes'))){
                    $url[] = $value;
                }
            }
        }

        $url = implode('/', $url);
        $url = str_replace('//', '/', $url);
        return $url;
    }
}
