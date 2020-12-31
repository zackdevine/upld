<?php

use App\Models\Domain;
use App\Http\Controllers\DomainController;
use Illuminate\Support\Facades\Route;

Route::domain('{domain:domain}')->group(function ($domain)
{
    Route::get('{file_id}', [DomainController::class, 'view']);
});