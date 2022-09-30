<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('lang' , function(){
            if(auth()->user())
            {
                if(empty(auth()->user()->lang()))
                {
                    return 'en';
                }else {
                    return auth()->user()->lang();
                }
                }else{
                    if(session()->has('lang'))
                    {
                        return session()->get('lang');
                    }else{
                        return 'en';
                    }

            }
        });
        Schema::defaultStringLength(191);
    }
}
