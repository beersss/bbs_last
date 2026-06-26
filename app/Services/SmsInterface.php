<?php

namespace App\Services;

interface SmsInterface
{
    public function send(string $to, string $message);
}
