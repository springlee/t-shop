<?php

Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
Route::post('login', 'AuthController@login')->name('admin.doLogin');
Route::get('logout', 'AuthController@logout')->name('admin.logout');

Route::middleware(['auth.admin', 'check.admin'])->group(function (){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
});
