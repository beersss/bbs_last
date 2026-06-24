<?php

namespace App\Http\Controllers;

use App\Services\CodeService;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CodeController extends Controller
{
    function send()
    {
        // 从 服务容器中解析依赖实例的方式。
        return app(CodeService::class)->send('11233322');
    }
}
