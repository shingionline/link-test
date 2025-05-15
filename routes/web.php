<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home']);

// leads
Route::prefix('/links')->group(function () {
    Route::post('/list', [LinkController::class, 'list']);
    Route::post('/history', [LinkController::class, 'history']);
    Route::post('/check', [LinkController::class, 'check']);
});