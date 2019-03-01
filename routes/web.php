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

// User routes
Auth::routes();
Route::get('/logout', function () { Auth::logout(); return redirect('/'); });
Route::prefix('profile')->group(function () {
	Route::get('/', 'UserController@index')->name('profile');
	if (config('services.stripe.enabled')) { Route::get('/plans', 'UserController@choosePlan'); }

	Route::get('/download/{type}', 'UserController@downloadProfile');
});

// User routes
Route::domain('{username}.upld.app')->group(function ($username) {
	Route::get('/', function () { redirect()->away(config('app.url')); });
	Route::get('/{file}', 'UserController@getFile');
});



// Stripe webhook
if (config('services.stripe.enabled')) {
	Route::post(
	    'stripe/webhook',
	    '\App\Http\Controllers\StripeController@handleWebhook'
	);
}