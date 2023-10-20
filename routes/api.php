<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SlideController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['set.language'])->prefix('/v1')->group(function () {

    Route::apiResource('/contacts', ContactController::class)->only('store');
    Route::apiResource('/gallery', GalleryController::class)->only([
        'index',
        'show'
    ]);
    Route::apiResource('/slides', SlideController::class)->only([
        'index',
        'show'
    ]);
});
