<?php

use App\Models\Subdomain;
use App\Http\Controllers\SubdomainController;
use Illuminate\Support\Facades\Route;

Route::domain("{subdomain:subdomain}." . env('APP_BASE_URL'))->group(function ($subdomain)
{
    Route::get('{file_id}', [SubdomainController::class, 'view']);
});