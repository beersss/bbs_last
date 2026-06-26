<?php

namespace App\Http\Controllers;

use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\PhoneRule;


class CodeController extends Controller
{
    public function send(Request $request)
    {
        Validator::make(
            $request->input(),
            [
                'phone' => ['required', new PhoneRule()]
            ],
        )->validate();

        return app(CodeService::class)->send($request->input('phone'), '短信验证码: ');
    }
}
