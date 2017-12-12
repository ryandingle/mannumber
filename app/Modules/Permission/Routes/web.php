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

Route::group(['prefix' => 'permission', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'PermissionController@index')->name('permission');

    /*CRUD Role*/
    Route::get('create', 'PermissionController@create')->name('permission-create');
    Route::post('store', 'PermissionController@store');
    Route::get('{id}/edit', 'PermissionController@edit')->name('permission-edit');
    Route::post('{id}/update', 'PermissionController@update');
    Route::get('{id}/show', 'PermissionController@show')->name('permission-show');
    Route::post('{id}/destroy', 'PermissionController@destroy');
});
