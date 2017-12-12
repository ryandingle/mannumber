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

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'UserController@index')->name('user');

    /*CRUD Role*/
    Route::get('create', 'UserController@create')->name('user-create');
    Route::post('store', 'UserController@store');
    Route::get('{id}/edit', 'UserController@edit')->name('user-edit');
    Route::post('{id}/update', 'UserController@update');
    Route::get('{id}/show', 'UserController@show')->name('user-show');
    Route::post('{id}/destroy', 'UserController@destroy');
});
