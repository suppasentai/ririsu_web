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
Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

Route::get('/releases/{slug}',  ['as' => 'releases.show', 'uses' => 'ReleaseController@show']);

//create institution
Route::group(['prefix' => 'companies'], function () {
    Route::get('create_step1', 'CompanyController@create_step1')->name('create_step1');
    Route::post('create_step1', 'CompanyController@post_create_step1')->name('post_create_step1');
    Route::post('create_step2', 'CompanyController@post_create_step2')->name('post_create_step2');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::resource('tags', 'TagController');

    Route::get('my_account', 'AccountController@index')->name('my_account');
    Route::get('my_articles', 'AccountController@articles')->name('my_acticles');
    Route::get('update_my_account', 'AccountController@edit')->name('my_account_edit');
    Route::post('update_my_account', 'AccountController@update')->name('my_account_update');
    Route::get('update_password', 'AccountController@editPassword')->name('password_edit');
    Route::post('update_password', 'AccountController@updatePassword')->name('password_update');

    Route::resource('categories', 'CategoryController');
    //Route::resource('instutions', 'InstitutionController');

    Route::get('create_articles', 'ReleaseController@create')
        ->name('create_articles')
        ->middleware('can:release.create');
    Route::post('create_articles', 'ReleaseController@store')
        ->name('store_articles')
        ->middleware('can:release.create');

    Route::get('articles_form_status', 'DashboardController@articlesFormStatus')
        ->name('articlesFormStatus')
        ->middleware('can:release.publish');
    Route::post('articlesChangeStatus/{article}', 'DashboardController@articlesChangeStatus')
        ->name('articlesChangeStatus')
        ->middleware('can:release.publish');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rc', 'RecommendController@test');
