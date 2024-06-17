<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class PhoneValidationRule implements Rule
{
    protected $countryCode = 0;

    public function __construct($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function passes($attribute, $value)
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();

        $countries = config('settings.countries');

        try {
            $phone = '+' . $this->countryCode . preg_replace("/[^0-9]/", "", $value);
            $phoneNumber = $phoneNumberUtil->parse($phone, $countries[$this->countryCode]);
            return $phoneNumberUtil->isValidNumber($phoneNumber);
        } catch (\libphonenumber\NumberParseException $e) {
            return false;
        }
    }

    public function message()
    {
        return 'The :attribute field is not a valid phone number.';
    }
}
