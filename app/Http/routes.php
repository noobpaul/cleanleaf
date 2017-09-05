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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@postContact');

Route::get('/services', 'HomeController@services')->name('services');

Route::auth();

Route::get('admin/{username}', 'AdminController@admin')->name('admin');

Route::get('admin/{username}/register', 'AdminController@adminRegisterView')->name('adminRegisterView');

Route::post('admin/{username}/register', 'AdminController@adminRegisterPost')->name('adminRegisterPost');

Route::get('admin/{username}/job-order', 'AdminController@adminJobOrder')->name('adminJobOrder');

Route::post('admin/{username}/job-order', 'AdminController@adminJobOrderPost')->name('adminJobOrderPost');

Route::get('admin/job-order-pdf/{id}/view', 'AdminController@adminJobOrderPdf')->name('adminJobOrderPdf');

Route::get('admin/{username}/job-order/{id}/accept', 'AdminController@adminJobOrderAccept')->name('adminJobOrderAccept');

Route::get('admin/{username}/job-order/{id}/reject', 'AdminController@adminJobOrderReject')->name('adminJobOrderReject');

Route::get('admin/{username}/settings', 'AdminController@adminSettings')->name('adminSettings');

Route::patch('admin/{username}/settings', 'AdminController@adminSettingsUpdate')->name('adminSettingsUpdate');

Route::patch('admin/{username}/password', 'AdminController@adminPasswordUpdate')->name('adminPasswordUpdate');

Route::patch('admin/{username}/image', 'AdminController@adminImage')->name('adminImage');