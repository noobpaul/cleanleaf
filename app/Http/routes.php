<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('admin/{username}', 'AdminController@admin')->name('admin');

Route::get('admin/{username}/job-order', 'AdminController@adminJobOrder')->name('adminJobOrder');

Route::get('admin/{username}/settings', 'AdminController@adminSettings')->name('adminSettings');

Route::patch('admin/{username}/settings', 'AdminController@adminSettingsUpdate')->name('adminSettingsUpdate');

Route::patch('admin/{username}/password', 'AdminController@adminPasswordUpdate')->name('adminPasswordUpdate');

Route::patch('admin/{username}/image', 'AdminController@adminImage')->name('adminImage');
