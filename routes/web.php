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

Route::get('/releases/{slug}',  ['as' => 'releases.show', 'uses' => 'ReleaseController@show']);

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('my_account', 'AccountController@index')->name('my_account');
    Route::get('my_articles', 'AccountController@articles')->name('my_acticles');
    Route::get('update_my_account', 'AccountController@edit')->name('my_account_edit');
    Route::post('update_my_account', 'AccountController@update')->name('my_account_update');
    Route::get('update_password', 'AccountController@editPassword')->name('password_edit');
    Route::post('update_password', 'AccountController@updatePassword')->name('password_update');

    Route::resource('categories', 'CategoryController');
    ROute::resource('instutions', 'InstitutionController');

    Route::resource('articles', 'ReleaseController');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rc', function () {
    $releases        = json_decode(file_get_contents(storage_path('data/products-data.json')));
    $selectedId      = intval(app('request')->input('id') ?? '8');
    $selectedRelease = $releases[0];

    $selectedReleases = array_filter($releases, function ($release) use ($selectedId) { return $release->id === $selectedId; });
    if (count($selectedReleases)) {
        $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
    }

    $releaseSimilarity = new App\ProductSimilarity($releases);
    $similarityMatrix  = $releaseSimilarity->calculateSimilarityMatrix();
    $releases          = $releaseSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);

    return view('recomtest', compact('selectedId', 'selectedRelease', 'releases'));
});
