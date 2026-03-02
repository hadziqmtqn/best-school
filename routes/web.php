<?php

use App\Http\Controllers\Home\AgendaController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LeadershipGreetingController;
use App\Http\Controllers\Home\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('page/{post}', [PostController::class, 'page'])->name('page');

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
});

Route::get('leadership-greeting', [LeadershipGreetingController::class, 'index'])->name('leadership-greeting.index');

Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
