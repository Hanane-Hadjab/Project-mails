<?php

namespace App\componenets\Mail\Application\Providers;

use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom([
            __DIR__.'/../Views'
        ], 'mail');
    }
}
