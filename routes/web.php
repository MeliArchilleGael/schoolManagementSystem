<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('home');
    Route::get('calendar', [FrontController::class, 'calender'])->name('calendar');
    Route::get('todolist', [FrontController::class, 'todolist'])->name('todoList');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

