<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TranslateController extends Controller
{
    public function translationFromTheMainLanguage(Request $request)
    {
        return response()->json([
            'success' => html_entity_decode(Str::apiTranslate($request->text, $request->language, config('settings.mainLanguageAdmin')))
        ]);
    }
}
