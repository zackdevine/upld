<?php

use App\Models\UserConfig;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'user.home')->name('home');
Route::get('/uploads', [UserController::class, 'uploads'])->name('uploads');
Route::view('/subdomain', 'user.subdomain')->name('subdomain');
Route::view('/domain', 'user.domain')->name('domain');

Route::view('/upload', 'user.upload')->name('upload');
Route::post('/upload', [UserController::class, 'doUpload'])->name('upload');

Route::post('/subdomain', [UserController::class, 'updateSubdomain'])->name('subdomain');
Route::post('/domain', [UserController::class, 'updateDomain'])->name('domain');

// Configs
Route::prefix('config')->group(function ()
{
    Route::get('/sharex', function () { return UserConfig::getShareX(Auth::user()); })->name('config.sharex');
});