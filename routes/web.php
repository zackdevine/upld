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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/features', 'HomeController@features')->name('features');
Route::get('/plans', 'HomeController@plans')->name('plans');
Route::get('/download', 'HomeController@download')->name('download');

Route::prefix('docs')->group(function () {
	Route::get('/', 'DocsController@index')->name('docs');
	Route::get('/{page}', 'DocsController@view');
});

Auth::routes();
Route::get('/profile', 'HomeController@profile')->name('profile');

// User routes
Route::domain('{username}.upld.gg')->group(function () {
	Route::get('/', 'UserController@index');
	Route::get('/{file}', 'UserController@getFile');
});