<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comunidad;
use App\Models\Etiqueta;
use App\Models\Post;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct(){
    //     $this->middleware('auth')->only('index','delete','create');
    //     $this->middleware('auth')->except('update');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $comunidad = Comunidad::find($request->comunidad_id);
        if(Auth::id() == $comunidad->user_id){
            $request->merge(["estado_moderacion" => "aprobado"]);
        }
        else{
            $request->merge(["estado_moderacion" => "en revision"]);
        }
        $request->merge(["user_id" => Auth::Id()]);
        $post = Post::create($request->all());

        // Separar las etiquetas
        $tags = explode("#",$request->tags);
        foreach($tags as $tag){
            if($tag != ""){
                $etiqueta = Etiqueta::firstOrCreate(['nombre' => strtolower($tag)]);
                $post->etiquetas()->attach($etiqueta->id);
            }
        }

        return redirect()->route('comunidades.show',$post->comunidad_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        $post->tags = $post->etiquetas->pluck('nombre')->implode("#");
        $post->tags = "#".$post->tags;
        return view('posts.edit',compact('post'));
    }

    public function comentarios(Post $post){
        return view('posts.comentarios',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update',$post);
        if($post->comunidad->user_id != Auth::id()){
            $post->estado_moderacion = 'en revision';
        }
        $post->update($request->all());
        return redirect()->route('comunidades.show',$post->comunidad_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user->id != Auth::id()){
            return redirect()->route('comunidades.show',$post->comunidad_id);
        }
        $post->delete();
        return redirect()->route('comunidades.show',$post->comunidad_id);
    }

    public function aceptar(Post $post){
        Gate::authorize('canAcceptOrDeny',$post);
        $post->estado_moderacion = 'aprobado';
        $post->save();
        return redirect()->route('comunidades.show',$post->comunidad_id);
    }

    public function like(Post $post){
        $voto = $post->votos()->where('user_id',Auth::id())->first();
        if($voto != null && $voto->estado == 'positivo'){
            return redirect()->route('comunidades.show',$post->comunidad_id);
        }
        else if($voto != null && $voto->estado == 'negativo'){
            $post->votos()->where('user_id',Auth::id())->delete();
        }
        $vote = new Voto([
            'user_id' => Auth::id(),
            'estado' => 'positivo'
        ]);
        $post->votos()->save($vote);
        return redirect()->back();
    }

    public function dislike(Post $post){
        $voto = $post->votos()->where('user_id',Auth::id())->first();
        if($voto != null && $voto->estado == 'negativo'){
            return redirect()->route('comunidades.show',$post->comunidad_id);
        }
        else if($voto != null && $voto->estado == 'positivo'){
            $post->votos()->where('user_id',Auth::id())->delete();
        }
        $vote = new Voto([
            'user_id' => Auth::id(),
            'estado' => 'negativo'
        ]);
        $post->votos()->save($vote);
        return redirect()->back();
    }

    public function denegar(Post $post){
        Gate::authorize('canAcceptOrDeny',$post);
        $post->estado_moderacion = 'rechazado';
        $post->save();
        return redirect()->route('comunidades.show',$post->comunidad_id);
    }

    public function etiqueta(Etiqueta $etiqueta){
        $posts = $etiqueta->posts;
        return view('posts.etiqueta',compact('posts','etiqueta'));
    }
}
