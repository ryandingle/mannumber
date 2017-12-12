<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*WEB ROUTES*/
Route::get('/', function () { 
	if(Auth::check()) return view('dashboard::dashboard');//Redirect::intended('/dashboard');
	return view('auth.login'); 
})->name('index');

//Auth::routes();
/*LOGIN ROUTE*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*REGISTER ROUTE DISABLED*/
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::get('register', 'Auth\RegisterController@register');

/*PASSWORD RESETS ROUTE*/
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

