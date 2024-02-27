<?php

use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("landing");
});

Route::resource('/posts',PostController::class);
Route::resource("/comunidades",ComunidadController::class)->parameters(['comunidades' => 'comunidad',]);

Route::get('/land',function(){
    return view('landing');
})->name("landing");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
