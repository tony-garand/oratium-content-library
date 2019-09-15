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


Route::get('/admin', function () {
    return redirect('nova/');
});

Route::group(['middleware' => ['auth:web,api', 'setTokenCookie']], function () {
  Route::get('/', 'TopicsController@index')->name('home');
  Route::get('/topics/{slug}', 'TopicsController@showTopic');
  Route::get('/jokes', 'JokesController@showJoke')->name('jokes');
});;

Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

Route::get('/login', function () {
  return redirect('/nova/login');
})->name('login');
