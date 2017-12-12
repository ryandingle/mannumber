<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'account', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'AccountController@index')->name('account');

    /*CRUD Role*/
    Route::post('store', 'AccountController@store');
    Route::get('{id}/edit', 'AccountController@edit')->name('account-edit');
    Route::post('{id}/update', 'AccountController@update');
    Route::get('{id}/show', 'AccountController@show')->name('account-show');
});
