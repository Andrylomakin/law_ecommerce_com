<?php

return [
    /*
    |--------------------------------------------------------------------------
    | GeoIP Driver Type
    |--------------------------------------------------------------------------
    |
    | Supported: "ip-api", "maxmind_database", "maxmind_api"
    |
    */
    'driver' => 'maxmind_database',

    /*
    |--------------------------------------------------------------------------
    | Return random ipaddresses (useful for dev envs)
    |--------------------------------------------------------------------------
    */
    'random' => env('GEOIP_RANDOM', true),

    /*
    |--------------------------------------------------------------------------
    | IP-API Driver
    |--------------------------------------------------------------------------
    */
    'ip-api' => [
        // Check out pro here: https://signup.ip-api.com/
        'key' => env('GEOIP_IPAPI_KEY'),
        'lang' => env('GEOIP_IPAPI_LANG'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maxmind Database Driver
    |--------------------------------------------------------------------------
    */
    'maxmind_database' => [
        // Example: app_path().'/database/maxmind/GeoLite2-City.mmdb'
        'database' => base_path().'/'.env('GEOIP_MAXMIND_DATABASE', 'database/geoip/GeoLite2-Country.mmdb'),

        // The license key is required for database updates
        'license_key' => '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',
    ],

    /*
    |--------------------------------------------------------------------------
    | Maxmind Api Driver
    |--------------------------------------------------------------------------
    */
    'maxmind_api' => [
        'user_id' => env('GEOIP_MAXMIND_USER_ID'),
        'license_key' => env('GEOIP_MAXMIND_LICENSE_KEY'),
        //maxmind api will default to paid service. Use 'geolite.info' for free GeoLite2 Web service. https://github.com/maxmind/GeoIP2-php#usage-1
        'host' => env('GEOIP_MAXMIND_HOST'),
        //local required on client call but defaults to 'en' for english.
        'locales' => ['en'],
    ],
];
