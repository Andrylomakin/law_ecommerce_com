<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = false;

    public static function getSettings($domain)
    {
        $setting = Setting::where('domain', '=', $domain)->first();
        if ($setting) {
            $settings = json_decode($setting->settings);

            if(isset($settings->intl_tel_input)){
                foreach ($settings->intl_tel_input as $value){
                    $settings->tel_mask[] = $value;
                }
                $settings->tel_mask = implode(',', array_map(function($item) {
                    return "'$item'";
                }, $settings->tel_mask));

                unset($settings->intl_tel_input);
            }else{
                $settings->tel_mask = implode(',', array_map(function($item) {
                    return "'$item'";
                }, config('settings.languageCodes')));
            }

            return $settings;
        }else{
            return false;
        }
    }
}
