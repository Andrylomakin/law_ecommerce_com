<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LocalizationController extends Controller
{
    public function index()
    {
        $path = resource_path('lang/'.config('settings.mainLanguageAdmin').'.json');
        $localizations = $this->openLanguageReturnToJson($path);
        return view('admin.template.localization', compact('localizations'));
    }

    public function edit(Request $request)
    {
        $path = resource_path('lang/'.config('settings.mainLanguageAdmin').'.json');
        $this->openAndSaveJson($path, $request->key, $request->text);

        foreach (config('settings.languages') as $language){
            if($language['code'] == config('settings.mainLanguageAdmin')){
                $path = resource_path('lang/'.$language['code'].'.json');
                $this->openAndSaveJson($path, $request->key, $request->text);
            }else{
                $path = resource_path('lang/'.$language['code'].'.json');
                $this->openAndSaveJson($path, $request->key, Str::apiTranslate($request->text, $language['translate'], config('settings.mainLanguageAdmin')));
            }
        }

        return response()->json(['success' => true]);
    }


    private function openLanguageReturnToJson($path)
    {
        $JsonContents = File::get($path);
        return json_decode($JsonContents, true);
    }

    private function openAndSaveJson($path, $key, $text)
    {
        $json = $this->openLanguageReturnToJson($path);
        if(isset($json[$key])){
            $json[$key] = html_entity_decode($text);
        }
        File::put($path, json_encode($json, JSON_UNESCAPED_UNICODE));
    }
}
