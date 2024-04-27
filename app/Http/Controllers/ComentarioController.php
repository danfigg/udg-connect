<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'cuerpo'=>'min:3|max:255|required'
        ]);
        $post->comentarios()->create([
            'cuerpo' => $request->cuerpo,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('posts.comentarios',$post);
    }

    public function edit(Comentario $comentario)
    {
        Gate::authorize('update',$comentario);
        return view('comentarios.edit',compact('comentario'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        Gate::authorize('update',$comentario);
        $request->validate([
            'cuerpo'=>'min:3|max:255|required'
        ]);
        $comentario->update($request->all());
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        Gate::authorize('forceDelete',$comentario);
        $comentario->forceDelete();
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }

    public function soft_delete(Comentario $comentario){
        Gate::authorize('delete',$comentario);
        $comentario->delete();
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }

    public function restore(Comentario $comentario){
        Gate::authorize('restore',$comentario);
        if(!$comentario->trashed()){
            return redirect()->route('posts.comentarios',$comentario->comentable);
        }
        $comentario->restore();
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }

    public function like(Comentario $comentario){
        $voto = $comentario->votos()->where('user_id',Auth::id())->first();
        if($voto != null && $voto->estado == 'positivo'){
            return redirect()->route('posts.comentarios',$comentario->comentable);
        }
        else if($voto != null && $voto->estado == 'negativo'){
            $comentario->votos()->where('user_id',Auth::id())->delete();
        }
        $vote = new Voto([
            'user_id' => Auth::id(),
            'estado' => 'positivo'
        ]);
        $comentario->votos()->save($vote);
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }

    public function dislike(Comentario $comentario){
        $voto = $comentario->votos()->where('user_id',Auth::id())->first();
        if($voto != null && $voto->estado == 'negativo'){
            return redirect()->route('posts.comentarios',$comentario->comentable);
        }
        else if($voto != null && $voto->estado == 'positivo'){
            $comentario->votos()->where('user_id',Auth::id())->delete();
        }
        $vote = new Voto([
            'user_id' => Auth::id(),
            'estado' => 'negativo'
        ]);
        $comentario->votos()->save($vote);
        return redirect()->route('posts.comentarios',$comentario->comentable);
    }
}
