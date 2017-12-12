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

Route::group(['prefix' => 'role', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'RoleController@index')->name('role');

    /*CRUD Role*/
    Route::get('create', 'RoleController@create')->name('role-create');
    Route::post('store', 'RoleController@store');
    Route::get('{id}/edit', 'RoleController@edit')->name('role-edit');
    Route::post('{id}/update', 'RoleController@update');
    Route::get('{id}/show', 'RoleController@show')->name('role-show');
    Route::post('{id}/destroy', 'RoleController@destroy');
});
