<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormTestCommand extends Command
{
    protected $signature = 'app:form-test-command';

    protected $description = 'Command description';

    public function handle(Request $request)
    {

        $client = new Client();

        $response = $client->post('https://ps.profitsprint.net/api/signup/procform', [
            'headers' => [
                'x-trackbox-username' => 'nutralatam',
                'x-trackbox-password' => 'Pu(!YEhxc59Lzx3V,a+_',
                'x-api-key' => '2643889w34df345676ssdas323tgc738',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'ai' => 2958128,
                'ci' => 1,
                'gi' => 145,
                'userip' => $request->ip(),
                'firstname' => 'Gnanapiasam',
                'lastname' => 'Johnsasdhan',
                'email' => 'tesfaf321@gmail.com',
                'password' => 'Aa12345!',
//                'phone' => '4407012259886',
                'phone' => '34933177585',
//                'phone' => '33579332159',
                'so' => 'funnelname',
                'sub' => 'FreeParam',
                'MPC_1' => 'FreeParam',
                'MPC_2' => 'FreeParam',
                'MPC_3' => 'FreeParam',
                'MPC_4' => 'FreeParam',
                'MPC_5' => 'FreeParam',
                'MPC_6' => 'FreeParam',
                'MPC_7' => 'FreeParam',
                'MPC_8' => 'FreeParam',
                'MPC_9' => 'FreeParam',
                'MPC_10' => 'FreeParam',
            ],
        ]);

        $body = $response->getBody();
        $contents = $body->getContents();

        $json = json_decode($contents, true);
        dd($json);

        if ($json['status']) {
            return 1;
        } elseif ($json['status'] == false) {
            dd(2);
        }
    }
}
