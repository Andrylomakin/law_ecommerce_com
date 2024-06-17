<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => 'required',
            'name_in' => 'required',
            'name_tr' => 'required',
            'name_es' => 'required',
            'name_de' => 'required',
            'name_fr' => 'required',
            'name_it' => 'required',
            'name_nl' => 'required',
            'name_pl' => 'required',
            'name_ru' => 'required',
            'slug' => 'required',
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
