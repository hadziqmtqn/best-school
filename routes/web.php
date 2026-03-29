<?php

use App\Http\Controllers\Home\AgendaController;
use App\Http\Controllers\Home\AnnouncementController;
use App\Http\Controllers\Home\GalleryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LeadershipGreetingController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\Home\SchoolIdentityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('page/{post}', [PostController::class, 'page'])->name('page');

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
});

Route::get('leadership-greeting', [LeadershipGreetingController::class, 'index'])->name('leadership-greeting.index');

Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::get('school-identity', [SchoolIdentityController::class, 'index'])->name('school-identity.index');

Route::prefix('gallery')->group(function () {
    Route::get('/photo', [GalleryController::class, 'photo'])->name('gallery.photo');
    Route::get('/video', [GalleryController::class, 'video'])->name('gallery.video');
});

Route::get('announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
