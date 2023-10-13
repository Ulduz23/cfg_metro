<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('set.language')->prefix('/')->group(function() {
    Route::resource('/contacts', ContactController::class)->only([
        'index',
        'show',
        'destroy'
    ]);
    
    Route::get('/{lang}', function($lang) {
        if (in_array($lang, config('translatable.locales')))
        {
            app()->setLocale($lang);
            session()->put('locale', $lang);
        }

        return redirect('/');
    });
});