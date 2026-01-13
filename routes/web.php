<?php

use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('page/{post}', [PostController::class, 'show'])->name('page.show');
