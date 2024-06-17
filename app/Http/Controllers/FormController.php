<?php

namespace App\Http\Controllers;

use App\Helpers\SendMessageTelegram;
use App\Models\Setting;
use App\Rules\PhoneValidationRule;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleHttpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function sendForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|regex:/^[\p{L}\s]{2,}$/u',
            'lastname' => 'required|regex:/^[\p{L}\s]{2,}$/u',
            'email' => 'required|email',
            'phone' => ['required', new PhoneValidationRule($request->input('country_code'))],
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->messages() as $fieldName => $fieldErrors) {
                $errors[$fieldName] = __('Обязательное поле');
            }
            return response()->json(['errors' => $errors, 'debug' => $request->cookie('mpc3')], 200);
        }

        // Отправляем заявку
        $phone = $request->get('country_code') . str_replace(['+', ' '], '', $request->get('phone'));
        $phoneNumberDigitsOnly = preg_replace("/[^0-9]/", "", $phone);

        // Сессии
        session(['phoneSession' => $phoneNumberDigitsOnly]);
        session(['lastName' => $request->get('lastname')]);

        // Setting
        $setting = Setting::getSettings($request->getHost());

        // Telegram
        $botApiToken = $setting->telegram_token;
        $chatId = $setting->telegram_chat_id;
        $telegram = new  SendMessageTelegram($botApiToken, $chatId);

        $telegram->send([
            '*********************************',
            '<b>' . $setting->telegram_tittle . '</b>',
            '<b>' . 'Email: ' . '</b>' . $request->get('email'),
            '<b>' . 'Имя: ' . '</b>' . $request->get('firstname'),
            '<b>' . 'Фамилия: ' . '</b>' . $request->get('lastname'),
            '<b>' . 'Телефон: ' . '</b>' . $phoneNumberDigitsOnly,
            '<b>' . 'Языковая версия сайта: ' . '</b>' . App::getLocale(),
            '<b>' . 'SO: ' . '</b>' . $request->get('so'),
            '<b>' . 'URL: ' . '</b>' . $request->get('url'),
        ]);

        return response()->json(['redirect' => route('success')], 200)->withCookie(Cookie::forget('mpc3'));
    }
}
