<?php

namespace App\Services;

class CodeService
{
    public function send(string $phone)
    {
        return "向{$phone}发送了验证码";
    }
}
