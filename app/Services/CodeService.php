<?php

namespace App\Services;

use App\Exceptions\VerificationCodeRateLimitException;
use Illuminate\Support\Facades\Cache;


class CodeService
{
    // 此方法只用于注册和重置密码用 

    public function send(string $phone, string $message): string
    {
        $code = $this->code($phone);

        if (app()->environment('local')) {
            return 'local-' . $code;
        }

        app(TwilioService::class)->send($phone, $message . $code);

        return (string) $code;
    }

    protected function code(string $phone): int
    {
        if (Cache::get("sms_code:{$phone}")) {
            throw new VerificationCodeRateLimitException;
        }

        $code = mt_rand(100000, 999999);
        Cache::put("sms_code:{$phone}", $code, 30);

        return $code;
    }
}
