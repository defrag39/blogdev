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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Log in & log out
Route::get('wblog/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('wblog/login', 'Auth\LoginController@login');
Route::post('wblog/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('wblog/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('wblog/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('wblog/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('wblog/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('wblog/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('wblog/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('wblog/listpost','BlogController@getall');
Route::get('wblog/write','BlogController@getwrite');
Route::post('wblog/write','BlogController@writeup');
Route::post('wblog/addcat','BlogController@addcat');
Route::get('wblog/editpost/{id}','BlogController@getedit');
Route::post('wblog/editpost/{id}','BlogController@saveedit');
Route::get('posts/{id}','BlogController@getpost');
Route::get('category/{id}','BlogController@getcat');
