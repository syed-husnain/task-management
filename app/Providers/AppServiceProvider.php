<?php

namespace App\Providers;

use App\Models\Configuration;
use Cookie;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        dd(auth('api')->check());
        $response = [];

        if (Schema::hasTable('configurations')) {
            $configuration = Configuration::first();
            $response['configuration'] = $configuration;
        }

        if (Cookie::has('customer_email')) {
            if (Cookie::get('customer_email') != null && Cookie::get('customer_email') != '') {
                $encrypter = app(Encrypter::class);
                $response['customerID'] = Cookie::get('customer_email');
            } else {
                $response['customerID'] = '';
            }
        } else {
            $response['customerID'] = '';
        }



        if (Cookie::has('visitor_info')) {

        }else{
            Cookie::queue(Cookie::make('visitor_info',Str::uuid()), 720);
        }

        View::share($response);
    }
}
