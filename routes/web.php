<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;

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

Route::middleware('set.language')->prefix('/')->group(function () {

    Route::resource('/contacts', ContactController::class)->only([
        'index',
        'show',
        'destroy'
    ]);

    Route::middleware('auth:web')->prefix('/admin')->group(function () {

        Route::prefix('/gallery')->group(function () {
            Route::get('/', [GalleryController::class, 'list'])->name('gallery.list');
            Route::get('/{gallery}', [GalleryController::class, 'view'])->name('gallery.view');
            Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
            Route::post('/', [GalleryController::class, 'store'])->name('gallery.store');
            Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
            Route::match(['put', 'patch'], '/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
            Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        });
    });

    Route::get('/{lang}', function ($lang) {
        if (in_array($lang, config('translatable.locales'))) {
            app()->setLocale($lang);
            session()->put('locale', $lang);
        }

        return redirect('/');
    });
});
