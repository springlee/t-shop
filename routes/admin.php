<?php

Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
//Route::middleware([''])->group(function (){
    Route::get('/', 'HomeController@dashboard')->name('admin.home');
    Route::get('logout', 'AuthController@showLoginForm')->name('admin.doLogin');
//});
