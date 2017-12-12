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

Route::group(['prefix' => 'module', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'ModuleController@index')->name('module');

    /*CRUD Role*/
    Route::get('create', 'ModuleController@create')->name('module-create');
    Route::post('store', 'ModuleController@store');
    Route::get('{id}/edit', 'ModuleController@edit')->name('module-edit');
    Route::post('{id}/update', 'ModuleController@update');
    Route::get('{id}/show', 'ModuleController@show')->name('module-show');
    Route::post('{id}/destroy', 'ModuleController@destroy');
});
