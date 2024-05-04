<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ComunidadRequest;
use App\Models\Centro;
use App\Models\CentroCarrera;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $comunidades = Comunidad::all();
        return view('comunidades.index', compact('comunidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $centros = Centro::all();
        return view('comunidades.create',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComunidadRequest $request): RedirectResponse
    {
        $request->merge(['user_id' => Auth::id()]);
        $comunidad = Comunidad::create($request->all());
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $ruta = $request->banner->store('','public');

            $archivo = new Image();
            $archivo->ubicacion = $ruta;
            $archivo->nombre_original = $request->banner->getClientOriginalName();
            $archivo->mime = $request->banner->getClientMimeType();
            $comunidad->banner()->save($archivo);
        }
        return redirect()->route('comunidades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comunidad $comunidad): View
    {
        $comunidad::with(['carreras','posts.etiquetas', 'eventos'])->get();
        return view('comunidades.show', compact('comunidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comunidad $comunidad): View
    {
        Gate::authorize('update', $comunidad);
        $centros = Centro::all();
        return view('comunidades.edit', compact('comunidad', 'centros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComunidadRequest $request, Comunidad $comunidad): RedirectResponse
    {
        Gate::authorize('update', $comunidad);
        $comunidad->update($request->all()); 
        return redirect()->route('comunidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comunidad $comunidad): RedirectResponse
    {
        Gate::authorize('delete', $comunidad);
        if($comunidad->banner != null){
            Storage::delete('public/'.$comunidad->banner->ubicacion);
        }
        $comunidad->delete();
        return redirect()->route('comunidades.index');
    }

    public function add_follower(Comunidad $comunidad){
        $user = DB::table('comunidad_users')->where('comunidad_id', $comunidad->id)->where('user_id', Auth::id())->first();
        if($user){
            return redirect()->route('comunidades.show', $comunidad);
        }
        else{
            $comunidad->usuarios()->attach(Auth::id());
            return redirect()->route('comunidades.show', $comunidad);
        }
    }

    public function remove_follower(Comunidad $comunidad){
        $user = DB::table('comunidad_users')
                    ->where('comunidad_id', $comunidad->id)
                    ->where('user_id', Auth::id())
                    ->first();
            if($user){
            DB::table('comunidad_users')
                ->where('comunidad_id', $comunidad->id)
                ->where('user_id', Auth::id())
                ->delete();
            
            return redirect()->route('comunidades.show', $comunidad);
        } else {
            return redirect()->route('comunidades.show', $comunidad);
        }
    }

    public function add_career_form(Comunidad $comunidad){
        Gate::authorize('addCareers', $comunidad);
        $carreras = CentroCarrera::where('centro_id', $comunidad->centro_id)->get();
        return view('comunidades.add_career', compact('comunidad','carreras'));
    }

    public function add_career(Request $request,Comunidad $comunidad){
        Gate::authorize('addCareers',$comunidad);
        // Check if the relation already exists
        if(DB::table('comunidad_carreras')->where('comunidad_id',$comunidad->id)->where('centro_carrera_id',$request["centro_carrera_id"])->first()){
            return redirect()->route('comunidades.show',$comunidad);
        }
        $comunidad->carreras()->attach($request["centro_carrera_id"]);
        return redirect()->route('comunidades.show',$comunidad);
    }

    public function delete_career(Comunidad $comunidad,CentroCarrera $CentroCarrera){
        Gate::authorize('addCareers',$comunidad);
        $comunidad->carreras()->detach($CentroCarrera->id);
        return redirect()->route('comunidades.show',$comunidad);
    }
}
