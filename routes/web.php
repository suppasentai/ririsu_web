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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('my_account', 'AccountController@index')->name('my_account');
    Route::get('my_articles', 'AccountController@articles')->name('my_acticles');
    Route::get('update_my_account', 'AccountController@edit')->name('my_account_edit');
    Route::post('update_my_account', 'AccountController@update')->name('my_account_update');

    Route::resource('articles', 'ReleaseController');
});



Route::get('/home', 'HomeController@index')->name('home');
