<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cuerpo'=>'min:3|max:255|required'
        ]);
        $request->merge(["user_id"=>Auth::Id()]);
        Comentario::create($request->all());
        return redirect()->route('posts.comentarios',$request->post_id);
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
        return redirect()->route('posts.comentarios',$comentario->post_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        Gate::authorize('forceDelete',$comentario);
        $comentario->forceDelete();
        return redirect()->route('posts.comentarios',$comentario->post_id);
    }

    public function soft_delete(Comentario $comentario){
        Gate::authorize('delete',$comentario);
        $comentario->delete();
        return redirect()->route('posts.comentarios',$comentario->post_id);
    }

    public function restore(Comentario $comentario){
        Gate::authorize('restore',$comentario);
        if(!$comentario->trashed()){
            return redirect()->route('posts.comentarios',$comentario->post_id);
        }
        $comentario->restore();
        return redirect()->route('posts.comentarios',$comentario->post_id);
    }
}
