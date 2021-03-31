<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');
    Route::get('/true-or-false', [ActivitiesController::class, 'index'])->name('act_true_or_false');
});
