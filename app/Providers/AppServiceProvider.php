<?php

namespace App\Providers;

use App\Http\Middleware\SetLanguage;
use App\Models\Page;
use App\Models\PhoneMask;
use App\Models\SeoLading;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->composer('layouts._header', function ($view) {
            $view->with('categoryMenu', ServiceCategory::query()->orderBy('sort_order')->get());

            $array = [];
            foreach (config('settings.languageCodes') as $language){
                $array[$language] = [
                    'title' => $language,
                    'code' => $language,
                    'current' => $language == App::getLocale() ? true : false,
                    'url' => url(SetLanguage::parseRequestUri($language, $_SERVER['REQUEST_URI']))
                ] ;
            }
            $view->with('languages', $array);
        });

        view()->composer('layouts._footer', function ($view) {
            $view->with('categoryMenu', ServiceCategory::query()->orderBy('sort_order')->get());
            $view->with('pages', Page::query()->where('status', '=', 1)->orderBy('sort_order')->get());
        });

        view()->composer('layouts.app', function ($view) {
            $view->with('seo', SeoLading::query()->first());
            $view->with('phone_mask', PhoneMask::getMask());
        });

        Carbon::setLocale(config('app.locale'));

        view()->composer('*', function ($view) {
            $languageUrls = [];

            $currentLocale = request()->segment(1);
            $locales = config('settings.languageCodes');
            $defaultLocale = config('settings.mainLanguage');

            // Remove language prefix if not default from segments
            if ($currentLocale !== $defaultLocale && in_array($currentLocale, $locales)) {
                $noPrefixSegments = request()->segments();
                array_shift($noPrefixSegments);
                $noPrefixSegments = implode('/', $noPrefixSegments);
            }
            // Keep all segments
            else {
                $noPrefixSegments = request()->segments();
                $noPrefixSegments = implode('/', $noPrefixSegments);
            }

            // Generate an array of locales associated with URLs
            foreach ($locales as $locale) {
                if ($locale === $defaultLocale) {
                    $languageUrls[$locale] = $noPrefixSegments ?: '';
                } else {
                    $languageUrls[$locale] = rtrim($locale . '/' . $noPrefixSegments, '/');
                }
            }
            return $view->with('languageUrls', $languageUrls);

        });

        view()->composer('*', function ($view) {
            $path = $view->getPath();
            if (!strpos($path, 'admin')) {
                $view->with('settings', Setting::getSettings(Request::getHost()));
            }
        });

    }
}
