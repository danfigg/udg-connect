<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('/comunidades',ComunidadController::class)->parameters(['comunidades' => 'comunidad',]); 
    Route::resource('/carreras',CarreraController::class);
    Route::resource('/posts',PostController::class);
    Route::resource('/comentarios',ComentarioController::class);
    Route::get('/posts/comentarios',[PostController::class,'view_comentarios'])->name('posts.comentarios');
    Route::post('/comunidades/{comunidad}/follower',[ComunidadController::class,'add_follower'])->name('comunidad.follower');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
