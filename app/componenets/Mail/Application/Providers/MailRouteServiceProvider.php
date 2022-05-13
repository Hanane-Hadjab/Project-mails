<?php

namespace App\componenets\Mail\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class MailRouteServiceProvider extends ServiceProvider
{
    protected $nameSpace = 'App\componenets\Mail\Application\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapMailRoutes();
    }

    public function mapMailRoutes()
    {
        \Illuminate\Support\Facades\Route::middleware(['web', 'auth'])
            ->namespace($this->nameSpace)
            ->group(function () {
                $base = "mail";
                Route::get("{$base}/create", [
                   'uses' => 'MailController@create',
                   'as' => 'mail.create'
                ]);

                Route::post("{$base}/store", [
                   'uses' => 'MailController@store',
                   'as' => 'mail.store'
                ]);

                Route::get("{$base}", [
                   'uses' => 'MailController@index',
                   'as' => 'mail.index'
                ]);

                Route::get("{$base}/{mail}", [
                   'uses'=> 'MailController@show',
                   'as' => 'mail.show'
                ]);

                Route::delete("{$base}/{mail}/delete", [
                    'uses' => 'MailController@delete',
                    'as' => 'mail.delete'
                ]);

                Route::get("/get-received-mails", [
                    'uses' => 'MailController@getReceivedMails',
                    'as' => 'mail.get_received_mails'
                ]);
            });
    }
}
