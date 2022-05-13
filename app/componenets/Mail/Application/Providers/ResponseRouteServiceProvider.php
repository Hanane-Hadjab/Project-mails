<?php

namespace App\componenets\Mail\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ResponseRouteServiceProvider extends ServiceProvider
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
                $base = "mail/{mail}/response";

                Route::get("{$base}/create", [
                    'uses' => 'ResponseController@create',
                    'as' => 'response.create'
                ]);
                Route::post("{$base}/store", [
                    'uses' => 'ResponseController@store',
                    'as' => 'response.store'
                ]);
                Route::get("{$base}", [
                    'uses' => 'ResponseController@index',
                    'as' => 'response.index'
                ]);
                Route::get("{$base}/{mail}", [
                    'uses'=> 'ResponseController@show',
                    'as' => 'response.show'
                ]);
                Route::delete("{$base}/{mail}/delete", [
                    'uses' => 'ResponseController@delete',
                    'as' => 'response.delete'
                ]);
            });
    }
}
