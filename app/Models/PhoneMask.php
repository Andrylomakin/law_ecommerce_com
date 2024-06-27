<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use PulkitJalan\GeoIP\Facades\GeoIP;

class PhoneMask extends Model
{
    use HasFactory;

    public static function getMask()
    {
        $mask_by_country = self::getUserLanguageByIP(Request::ip());
        $masks = config('settings.mask');

        if(isset($masks[strtolower($mask_by_country)])){
            return $masks[strtolower($mask_by_country)];
        }elseif(isset($masks[App::getLocale()])){
            return $masks[App::getLocale()];
        }else{
            return array_shift($masks);
        }
    }

    private static function getUserLanguageByIP($ip)
    {
        $setip = GeoIP::setIp($ip);
        $countryCode = GeoIP::getCountryCode($setip);
        return $countryCode;
    }
}
