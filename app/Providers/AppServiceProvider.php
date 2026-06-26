<?php

namespace App\Providers;

use App\Services\CodeService;
use Illuminate\Support\ServiceProvider;
use App\Services\SmsInterface;
use App\Services\TwilioService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        // instance 方法将一个现有的对象实例绑定到容器中
        $this->app->instance(CodeService::class, new CodeService());
        $this->app->bind(SmsInterface::class, TwilioService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
