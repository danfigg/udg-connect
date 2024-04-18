<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventoController;
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
    Route::get('/comunidad/{comunidad}/add_career',[ComunidadController::class,'add_career_form'])->name('comunidad.add_careers_form');
    Route::put('/comunidad/{comunidad}/add_career',[ComunidadController::class,'add_career'])->name('comunidad.store_careers');
    Route::delete('/comunidad/{comunidad}/delete_career/{CentroCarrera}',[ComunidadController::class,'delete_career'])->name('comunidad.delete_career');
    Route::post('/comunidad/evento/{evento}/registrar',[EventoController::class,'registrar'])->name('evento.registrar');
    Route::delete('/comunidad/evento/{evento}/desregistrar',[EventoController::class,'desregistrar'])->name('evento.desregistrar');
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
