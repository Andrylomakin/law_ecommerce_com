<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoLading;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        $fields = ['domain', 'google_tags', 'google_tags_conversion', 'fb_pixel', 'verification_domain', 'logo', 'telegram_tittle', 'stylesheet', 'email', 'telegram_chat_id', 'telegram_token', 'telegram', 'viber', 'whatsapp'];
        $radioFields = [
            'determine_language_by' => [
                'type'   => 'radio',
                'title'  => 'Определять язык',
                'action' => ['update', 'store'],
                'group'  => 'setting',
                'values' => [
                    false     => 'Нет',
                    'ip'      => 'По ip определяем язык',
                    'browser' => 'Язык браузера'
                ]
            ],
        ];
        $countries = [];
        foreach (config('settings.countries') as $key => $value) {
            $countries[$key] = $value;
        }
        $checkboxFields = [
            'intl_tel_input' => [
                'type'   => 'checkbox',
                'title'  => 'Какие маски телефонов выводим',
                'action' => ['update', 'store'],
                'group'  => 'setting',
                'values' => $countries
            ]
        ];

        return view('admin.setting.edit', compact('fields', 'radioFields', 'checkboxFields'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domain'                 => 'required|min:3|unique:settings,domain',
            'google_tags'            => 'required|min:3',
            'google_tags_conversion' => 'required|min:3',
            'fb_pixel'               => 'required|min:3',
            'verification_domain'    => 'required|min:3',
            'logo'                   => 'required|min:3',
            'telegram_tittle'        => 'required|min:3',
            'stylesheet'             => 'required|min:3',
            'telegram_token'         => 'required|min:3',
            'telegram_chat_id'       => 'required|min:3',
            'telegram'               => 'required|min:3',
            'viber'                  => 'required|min:3',
            'whatsapp'               => 'required|min:3',
            'email'                  => 'required|min:3|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $domain = $request->input('domain');
            $data = $request->except('_token', 'domain');
            $setting = new Setting();
            $setting->domain = $domain;
            $setting->settings = json_encode($data);

            $setting->save();

            return redirect(route('admin.setting.index'))->with('success', 'Данные успешно добавлены');
        }

    }

    public function edit($id)
    {
        $fields = ['google_tags', 'google_tags_conversion', 'fb_pixel', 'verification_domain', 'logo', 'telegram_tittle', 'stylesheet', 'email', 'telegram_chat_id', 'telegram_token', 'telegram', 'viber', 'whatsapp'];
        $radioFields = [
            'determine_language_by' => [
                'type'   => 'radio',
                'title'  => 'Определять язык',
                'action' => ['update', 'store'],
                'group'  => 'setting',
                'values' => [
                    false     => 'Нет',
                    'ip'      => 'По ip определяем язык',
                    'browser' => 'Язык браузера'
                ]
            ],
        ];
        $countries = [];
        foreach (config('settings.countries') as $key => $value) {
            $countries[$key] = $value;
        }
        $checkboxFields = [
            'intl_tel_input' => [
                'type'   => 'checkbox',
                'title'  => 'Какие маски телефонов выводим',
                'action' => ['update', 'store'],
                'group'  => 'setting',
                'values' => $countries
            ]
        ];

        $setting = Setting::findOrFail($id);
        $settingsArray = json_decode($setting->settings, true);

        $setting = [
                'id'     => $setting->id,
                'domain' => $setting->domain,
            ] + $settingsArray;

        return view('admin.setting.edit', compact('fields', 'setting', 'radioFields', 'checkboxFields'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'google_tags'            => 'required|min:3',
            'google_tags_conversion' => 'required|min:3',
            'fb_pixel'               => 'required|min:3',
            'verification_domain'    => 'required|min:3',
            'logo'                   => 'required|min:3',
            'telegram_tittle'        => 'required|min:3',
            'stylesheet'             => 'required|min:3',
            'telegram_token'         => 'required|min:3',
            'telegram_chat_id'       => 'required|min:3',
            'telegram'               => 'required|min:3',
            'viber'                  => 'required|min:3',
            'whatsapp'               => 'required|min:3',
            'email'                  => 'required|min:3|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = $request->except(['id', '_token']);
            $setting = Setting::find($request->id);
            $setting->update(['settings' => json_encode($data)]);
            return redirect(route('admin.setting.index'))->with('success', 'Данные успешно обновлены');
        }
    }

    public function destroy($id)
    {
        $setting = Setting::find($id);
        $domain = $setting->domain;
        $setting->delete();
        return redirect(route('admin.setting.index'))->with('success', 'Настройки для домена ' . $domain . ' удалены.');
    }

}
