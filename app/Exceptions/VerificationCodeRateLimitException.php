<?php

namespace App\Exceptions;

use Exception;

class VerificationCodeRateLimitException extends Exception
{
    public function __construct(
        string $message = '请稍后再试',
        int $code = 429,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
