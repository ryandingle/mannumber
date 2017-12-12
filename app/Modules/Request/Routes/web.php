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

Route::group(['prefix' => 'request', 'middleware' => ['auth', 'module']], function () {
    Route::get('/', 'RequestController@index')->name('request');
    Route::get('/employees/{id}', 'EmployeeController@index')->name('employee');

    /*CRUD REQUEST*/
    Route::get('create', 'RequestController@create')->name('request-create');
    Route::post('store', 'RequestController@store');
    Route::get('{id}/edit', 'RequestController@edit')->name('request-edit');
    Route::post('{id}/update', 'RequestController@update');
    Route::get('{id}/show', 'RequestController@show')->name('request-show');
    Route::post('{id}/destroy', 'RequestController@destroy');

    /*EMPLOYEE REQUEST*/
    Route::get('employee/{id}/create', 'EmployeeController@create')->name('employee-create');
    Route::post('employee/{id}/store', 'EmployeeController@store');
    Route::get('employee/{id}/edit', 'EmployeeController@edit')->name('employee-edit');
    Route::post('employee/{id}/update', 'EmployeeController@update');
    Route::get('employee/{id}/show', 'EmployeeController@show')->name('employee-show');
    Route::post('employee/{id}/destroy', 'EmployeeController@destroy');
});
