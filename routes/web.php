<?php

use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts',PostController::class);
Route::resource("/comunidades",ComunidadController::class)->parameters(['comunidades' => 'comunidad',]);
