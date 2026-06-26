<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService implements SmsInterface
{
    protected Client $client;
    protected string $from;

    public function __construct()
    {
        $this->client = new Client(
            config('my.twilio.sid'),
            config('my.twilio.token')
        );

        $this->from = config('my.twilio.from');
    }

    public function send(string $to, string $message)
    {
        return $this->client->messages->create($to, [
            'from' => $this->from,
            'body' => $message,
        ]);
    }
}
