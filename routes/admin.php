<?php

Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
Route::get('logout', 'AuthController@login')->name('admin.doLogin');
Route::middleware([''])->group(function (){
    Route::get('/', 'HomeController@dashboard')->name('admin.home');

});
