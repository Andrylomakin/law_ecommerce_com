<?php

namespace App\Http\Controllers;

use App\Helpers\SendMessageTelegram;
use App\Models\Setting;
use App\Rules\PhoneValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function sendForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|regex:/^[\p{L}\s]{2,}$/u',
            'email' => 'nullable|email',
            'phone' => ['required', new PhoneValidationRule($request->input('country_code'))],
        ]);

        if ($validator->fails()) {
            $message_errors = [];

            foreach ($validator->errors()->toArray() as $key => $error){
                $message_errors[$key] = str_replace($key, '', $error);
            }
            return response()->json(['errors' => $message_errors, 'debug' => $request->cookie('mpc3')], 200);
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

        // utm
        $utm = [];
        if(Cookie::has('fbclid')){
            $utm[] = 'Facebook';
        }

        if(Cookie::has('gclid')){
            $utm[] = 'Google';
        }

        if(Cookie::has('utm_source')){
            $utm[] = Cookie::get('utm_source');
        }

        if($utm){
            $utm = implode(', ', $utm);
        }else{
            $utm = 'Неизвестно';
        }

        Log::info([
            '*********************************',
            '<b>' . $setting->telegram_tittle . '</b>',
            '<b>' . 'Email: ' . '</b>' . $request->get('email'),
            '<b>' . 'Имя: ' . '</b>' . $request->get('firstname'),
            '<b>' . 'Фамилия: ' . '</b>' . $request->get('lastname'),
            '<b>' . 'Телефон: ' . '</b>' . $phoneNumberDigitsOnly,
            '<b>' . 'Языковая версия сайта: ' . '</b>' . App::getLocale(),
            '<b>' . 'SO: ' . '</b>' . $request->get('so'),
            '<b>' . 'URL: ' . '</b>' . $request->get('url'),
            '<b>' . 'Откуда лид: ' . '</b>' . $utm,
        ]);

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
            '<b>' . 'Откуда лид: ' . '</b>' . $utm,
        ]);

        return response()->json(['redirect' => route('success')], 200)->withCookie(Cookie::forget('mpc3'));
    }
}
