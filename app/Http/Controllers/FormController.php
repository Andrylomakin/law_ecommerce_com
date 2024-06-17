<?php

namespace App\Http\Controllers;

use App\Helpers\SendMessageTelegram;
use App\Jobs\SendDataCrm;
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

        // Api
        if ($request->hasCookie('mpc3')) {
            $cookieMpc3 = $request->cookie('mpc3');
        }else{
            $cookieMpc3 = false;
        }
        SendDataCrm::dispatch([
            'userip' => $request->ip(),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'phone' => $phoneNumberDigitsOnly,
            'so' => $request->get('so'),
            'sub' => 'FreeParam',
            'MPC_1' => Carbon::now()->toDateTimeString(),
            'MPC_2' => 'FreeParam',
            'MPC_3' => $cookieMpc3,
            'MPC_4' => $request->ip(),
            'MPC_5' => 'FreeParam',
            'MPC_6' => 'FreeParam',
            'MPC_7' => 'FreeParam',
            'MPC_8' => 'FreeParam',
            'MPC_9' => 'FreeParam',
            'MPC_10' => 'FreeParam',
            'MPC_11' => 'FreeParam',
            'MPC_12' => $request->get('so'),
        ]);

        // Telegram
        $botApiToken = '6600076216:AAGBMdt3IAV80VZ3uPsh-LPY_BmppAmAA4g';
        $chatId = '-1002038884100';
        $telegram = new  SendMessageTelegram($botApiToken, $chatId);

        // Setting
        $setting = Setting::getSettings($request->getHost());

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
