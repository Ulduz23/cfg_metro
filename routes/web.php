<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SlideController;

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

        Route::prefix('/slide')->group(function () {
            Route::get('/', [SlideController::class, 'list'])->name('slide.list');
            Route::get('/{slide}', [SlideController::class, 'view'])->name('slide.view');
            Route::get('/create', [SlideController::class, 'create'])->name('slide.create');
            Route::post('/', [SlideController::class, 'store'])->name('slide.store');
            Route::get('/{slide}/edit', [SlideController::class, 'edit'])->name('slide.edit');
            Route::match(['put', 'patch'], '/{slide}', [SlideController::class, 'update'])->name('slide.update');
            Route::delete('/{slide}', [SlideController::class, 'destroy'])->name('slide.destroy');
        });

        Route::prefix('/banner')->group(function () {
            Route::get('/', [BannerController::class, 'list'])->name('banner.list');
            Route::get('/{banner}', [BannerController::class, 'view'])->name('banner.view');
            Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
            Route::post('/', [BannerController::class, 'store'])->name('banner.store');
            Route::get('/{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');
            Route::match(['put', 'patch'], '/{banner}', [BannerController::class, 'update'])->name('banner.update');
            Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');
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
