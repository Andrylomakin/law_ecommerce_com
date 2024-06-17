<?php

namespace App\Console\Commands;

use App\Helpers\SendMessageTelegram;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use PulkitJalan\GeoIP\Facades\GeoIP;
use PulkitJalan\GeoIP\GeoIPUpdater;


class TestComand extends Command
{

    protected $signature = 'app:test-comand';


    protected $description = 'Command description';


    public function handle()
    {

        $botApiToken = '6600076216:AAGBMdt3IAV80VZ3uPsh-LPY_BmppAmAA4g';
        $chatId = '-1002038884100';

        $telegram = new  SendMessageTelegram($botApiToken, $chatId);
        $telegram->send([
            '*********************************',
            '<b>' . 'INVEST' . '</b>',
            '<b>' . 'Email: ' . '</b>' . 1,
        ]);

    }
}
