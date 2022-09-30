<?php

use Illuminate\Support\Facades\Route;




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('lang/{lang}' , function ($lang){

    if(in_array($lang,['ar','en','es']))
    {
        if(auth()->user())
        {
            $user = auth()->user();
            $user->lang = $lang;
            $user->save();
        }else{
            if(session()->has('lang'))
            {
                session()->forget('lang');
            }
            session()->put('lang',$lang);
        }
    }else {
        if (auth()->user()) {
            $user = auth()->user();
            $user->lang = 'en';
            $user->save();
        } else {
            if (session()->has('lang')) {
                session()->forget('lang');
            }
            session()->put('lang', 'en');

        }
    }
    return back();
});

Route::group(['middleware'=>'lang'], function()
{
    Route::get('/', function () {
        return view('welcome');
    });
});
