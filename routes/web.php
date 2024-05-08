<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('index', [TodoController::class, 'index']);
Route::get('create', [TodoController::class, 'create']);
Route::post('store', [TodoController::class, 'store']);
Route::get('details/{todo}', [TodoController::class, 'details']);
Route::get('/edit/{todo}', [TodoController::class, 'edit']);
Route::post('/update/{todo}', [TodoController::class, 'update']);
Route::get('/delete/{todo}', [TodoController::class, 'delete']);

require __DIR__.'/auth.php';
