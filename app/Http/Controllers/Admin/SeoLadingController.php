<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoContact;
use App\Models\SeoLading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeoLadingController extends Controller
{
    public function seoIndex()
    {
        $seo = SeoLading::query()->find(1);

        return view('admin.seo.lading', compact('seo'));
    }

    public function seoContact()
    {
        $seo = SeoContact::query()->find(1);

        return view('admin.seo.contact', compact('seo'));
    }

    public function updateSeoIndex(Request $request)
    {
        $validation = [];
        foreach (config('settings.languages') as $language){
            $validation['seo.title.'.$language['code']] = 'required';
            $validation['seo.description.'.$language['code']] = 'required';
            $validation['seo.text.'.$language['code']] = 'required';
        }

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $seo = SeoLading::query()->find(1);
            $row = [];
            foreach (config('settings.languages') as $language){
                $row['seo_title'][$language['code']] = $request->seo['title'][$language['code']];
                $row['seo_description'][$language['code']] = $request->seo['description'][$language['code']];
                $row['seo_text'][$language['code']] = $request->seo['text'][$language['code']];
            }

            $seo->update($row);
            $seo->save();
            return redirect()->back()->with('success', 'Данные успешно обновлены');
        }

    }


    public function updateSeoContact(Request $request)
    {
        $validation = [];
        foreach (config('settings.languages') as $language){
            $validation['seo.title.'.$language['code']] = 'required';
            $validation['seo.description.'.$language['code']] = 'required';
            $validation['seo.text.'.$language['code']] = 'required';
        }

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $seo = SeoContact::query()->find(1);
            $row = [];
            foreach (config('settings.languages') as $language){
                $row['seo_title'][$language['code']] = $request->seo['title'][$language['code']];
                $row['seo_description'][$language['code']] = $request->seo['description'][$language['code']];
                $row['seo_text'][$language['code']] = $request->seo['text'][$language['code']];
            }

            $seo->update($row);
            $seo->save();
            return redirect()->back()->with('success', 'Данные успешно обновлены');
        }

    }
}
