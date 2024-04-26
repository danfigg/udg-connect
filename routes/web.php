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

Route::group([
    'prefix'=>'api',
],
function(){
    Route::get('comunidad/{comunidad}/eventos',[EventoController::class,'api_index'])->name('eventos.api_index');
});

Route::middleware(['auth','verified'])->group(function(){
    Route::resource('/comunidades',ComunidadController::class)->parameters(['comunidades' => 'comunidad',]); 
    Route::resource('/carreras',CarreraController::class);
    Route::resource('/posts',PostController::class);
    Route::resource('/comentarios',ComentarioController::class);
    Route::resource('/eventos',EventoController::class);

    Route::post('/comunidades/{comunidad}/follower',[ComunidadController::class,'add_follower'])->name('comunidad.follower');
    Route::put('/post/{post}/aceptar',[PostController::class, 'aceptar'])->name('post.aceptar');
    Route::put('/post/{post}/rechazar',[PostController::class, 'denegar'])->name('post.rechazar');
    Route::put('/post/{post}/like',[PostController::class, 'like'])->name('post.like');
    Route::put('/post/{post}/dislike',[PostController::class, 'dislike'])->name('post.dislike');

    Route::get('/posts/{post}/comentarios',[PostController::class,'comentarios'])->name('posts.comentarios');
    Route::delete('/comentarios/{comentario}',[ComentarioController::class,'soft_delete'])->name('comentarios.soft_delete');
    Route::put('/comentarios/{comentario}',[ComentarioController::class,'update'])->name('comentarios.update');
    Route::get('/comentarios/{comentario}/edit',[ComentarioController::class,'edit'])->name('comentarios.edit');
    Route::post('/comentarios',[ComentarioController::class,'store'])->name('comentarios.store');
    Route::delete('/comentarios/{comentario}/force_delete',[ComentarioController::class,'destroy'])->name('comentarios.force_delete');
    Route::put('/comentarios/{comentario}/restore',[ComentarioController::class,'restore'])->name('comentarios.restore');

    Route::put('/evento/{evento}/aceptar',[EventoController::class, 'aceptar'])->name('evento.aceptar');
    Route::put('/evento/{evento}/rechazar',[EventoController::class, 'rechazar'])->name('evento.rechazar'); 
    Route::get('/comunidad/{comunidad}/add_career',[ComunidadController::class,'add_career_form'])->name('comunidad.add_careers_form');
    Route::put('/comunidad/{comunidad}/add_career',[ComunidadController::class,'add_career'])->name('comunidad.store_careers');
    Route::delete('/comunidad/{comunidad}/delete_career/{CentroCarrera}',[ComunidadController::class,'delete_career'])->name('comunidad.delete_career');
    Route::post('/comunidad/evento/{evento}/registrar',[EventoController::class,'registrar'])->name('evento.registrar');
    Route::get('/etiqueta/{etiqueta}/posts',[PostController::class,'etiqueta'])->name('etiqueta.posts');
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
