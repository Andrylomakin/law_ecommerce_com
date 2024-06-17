<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendDataCrm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->post('https://ps.profitsprint.net/api/signup/procform', [
            'headers' => [
                'x-trackbox-username' => 'nutralatam',
                'x-trackbox-password' => 'Pu(!YEhxc59Lzx3V,a+_',
                'x-api-key'           => '2643889w34df345676ssdas323tgc738',
                'Content-Type'        => 'application/json',
            ],
            'json'    => [
                'ai'        => 2958128,
                'ci'        => 1,
                'gi'        => 145,
                'userip'    => $this->formData['userip'],
                'firstname' => $this->formData['firstname'],
                'lastname'  => $this->formData['lastname'],
                'email'     => $this->formData['email'],
                'password'  => 'Aa12345!',
                'phone'     => $this->formData['phone'],
                'so'        => $this->formData['so'],
                'sub'       => $this->formData['sub'],
                'MPC_1'     => $this->formData['MPC_1'],
                'MPC_2'     => $this->formData['MPC_2'],
                'MPC_3'     => $this->formData['MPC_3'],
                'MPC_4'     => $this->formData['MPC_4'],
                'MPC_5'     => $this->formData['MPC_5'],
                'MPC_6'     => $this->formData['MPC_6'],
                'MPC_7'     => $this->formData['MPC_7'],
                'MPC_8'     => $this->formData['MPC_8'],
                'MPC_9'     => $this->formData['MPC_9'],
                'MPC_10'     => $this->formData['MPC_10'],
                'MPC_12'     => $this->formData['MPC_12'],
            ],
        ]);

        $body = $response->getBody();
        $contents = $body->getContents();
    }
}
