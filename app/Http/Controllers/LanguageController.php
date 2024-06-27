<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\SetLanguage;

class LanguageController extends Controller
{

    public function index($lang)
    {
        $referer = redirect()->back()->getTargetUrl(); // URL предыдущей страницы
        $parse_url = parse_url($referer, PHP_URL_PATH); // URI предыдущей страницы

        // разбиваем на массив по разделителю
        $segments = explode('/', $parse_url);

        // Если URL (где нажали на переключение языка) содержал корректную метку языка
        if (isset($segments[1]) && in_array($segments[1], config('settings.languageCodes'))) {
            unset($segments[1]); // удаляем метку
        }

        // Добавляем метку языка в URL (если выбран не язык по-умолчанию)
        if ($lang != config('settings.mainLanguage')) {
            array_splice($segments, 1, 0, $lang);
        }

        // формируем полный URL
        $url = request()->root() . implode("/", $segments);

        // если были еще GET-параметры - добавляем их
        if (parse_url($referer, PHP_URL_QUERY)) {
            $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
        }

        Session::put('language', $lang);
        return redirect($url);
    }
}
