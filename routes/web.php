<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\LeadershipMemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/join-us', [SiteController::class, 'joinUs'])->name('join-us');
Route::post('/inquiry', [SiteController::class, 'submitInquiry'])->name('inquiry.submit');
Route::get('/leadership', [SiteController::class, 'leadership'])->name('leadership');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/donate', [SiteController::class, 'donate'])->name('donate');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
    });

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('gallery', [GalleryImageController::class, 'index'])->name('gallery.index');
        Route::get('gallery/create', [GalleryImageController::class, 'create'])->name('gallery.create');
        Route::post('gallery', [GalleryImageController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{gallery_image}/edit', [GalleryImageController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{gallery_image}', [GalleryImageController::class, 'update'])->name('gallery.update');
        Route::delete('gallery/{gallery_image}', [GalleryImageController::class, 'destroy'])->name('gallery.destroy');

        Route::get('leadership', [LeadershipMemberController::class, 'index'])->name('leadership.index');
        Route::get('leadership/create', [LeadershipMemberController::class, 'create'])->name('leadership.create');
        Route::post('leadership', [LeadershipMemberController::class, 'store'])->name('leadership.store');
        Route::get('leadership/{leadership_member}/edit', [LeadershipMemberController::class, 'edit'])->name('leadership.edit');
        Route::put('leadership/{leadership_member}', [LeadershipMemberController::class, 'update'])->name('leadership.update');
        Route::delete('leadership/{leadership_member}', [LeadershipMemberController::class, 'destroy'])->name('leadership.destroy');
    });
});
