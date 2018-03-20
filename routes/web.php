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

Route::get('/', 'IndexController@index');
Route::get('/news/{category_short_name}/{news_short_name}', 'NewsController@detail');
Route::get('/news/{category_short_name?}', 'NewsController@index');

Route::post('/comments/store', 'CommentController@store');

Route::get('/portfolio', 'PortfolioController@index');
Route::post('/portfolio', 'PortfolioController@store');
Route::get('/portfolio/{category_short_name}', 'PortfolioController@detail');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::resource('news','Admin\NewsController');

    Route::get('/news/{id}/comments', 'Admin\CommentController@index');
    Route::post('/comments/{id}', 'Admin\CommentController@destroy');

    Route::get('/feedback', 'Admin\FeedbackController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
