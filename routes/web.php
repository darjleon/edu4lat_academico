<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function() {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');
});
