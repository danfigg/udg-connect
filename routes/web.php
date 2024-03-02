<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts',PostController::class);
Route::resource('/comunidades',ComunidadController::class)->parameters(['comunidades' => 'comunidad',]);
Route::resource('/carreras',CarreraController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
