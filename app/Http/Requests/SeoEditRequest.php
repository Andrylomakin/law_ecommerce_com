<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoEditRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'seo_title_en' => 'required',
            'seo_description_en' => 'required',
            'seo_text_en' => 'required',
            'seo_title_in' => 'required',
            'seo_description_in' => 'required',
            'seo_text_in' => 'required',
            'seo_title_it' => 'required',
            'seo_description_it' => 'required',
            'seo_text_it' => 'required',
            'seo_title_tr' => 'required',
            'seo_description_tr' => 'required',
            'seo_text_tr' => 'required',
            'seo_title_es' => 'required',
            'seo_description_es' => 'required',
            'seo_text_es' => 'required',
            'seo_title_de' => 'required',
            'seo_description_de' => 'required',
            'seo_text_de' => 'required',
            'seo_title_fr' => 'required',
            'seo_description_fr' => 'required',
            'seo_text_fr' => 'required',
            'seo_title_nl' => 'required',
            'seo_description_nl' => 'required',
            'seo_text_nl' => 'required',
            'seo_title_pl' => 'required',
            'seo_description_pl' => 'required',
            'seo_text_pl' => 'required',
            'seo_title_ru' => 'required',
            'seo_description_ru' => 'required',
            'seo_text_ru' => 'required',
        ];
    }
}
