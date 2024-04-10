<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventoController;
use App\Http\Middleware\Authenticate;
use App\Models\Evento;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('/comunidades',ComunidadController::class)->parameters(['comunidades' => 'comunidad',]); 
    Route::resource('/carreras',CarreraController::class);
    Route::resource('/posts',PostController::class);
    Route::resource('/comentarios',ComentarioController::class);
    Route::resource('/eventos',EventoController::class);
    Route::get('/posts/comentarios',[PostController::class,'view_comentarios'])->name('posts.comentarios');
    Route::post('/comunidades/{comunidad}/follower',[ComunidadController::class,'add_follower'])->name('comunidad.follower');
    Route::put('/post/{post}/aceptar',[PostController::class, 'aceptar'])->name('post.aceptar');
    Route::put('/post/{post}/rechazar',[PostController::class, 'denegar'])->name('post.rechazar');
    Route::put('/post/{post}/like',[PostController::class, 'like'])->name('post.like');
    Route::put('/post/{post}/dislike',[PostController::class, 'dislike'])->name('post.dislike');
    Route::get('/posts/{post}/comentarios',[PostController::class,'comentarios'])->name('posts.comentarios');

    Route::put('/evento/{evento}/aceptar',[EventoController::class, 'aceptar'])->name('evento.aceptar');
    Route::put('/evento/{evento}/rechazar',[EventoController::class, 'rechazar'])->name('evento.rechazar'); 
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/siguiendo', function () {
        $comunidades = Auth::user()->comunidades;
        return view('dashboard',compact('comunidades'));
    })->name('siguiendo');
});
