<?php
Route::auth();

Route::get('/', 'HomeController@dashboard')->name('home');
