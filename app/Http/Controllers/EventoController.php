<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoRequest;
use App\Http\Resources\EventoResource;
use App\Mail\EventRegistered;
use App\Models\Comunidad;
use App\Models\Evento;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request): RedirectResponse
    {
        $comunidad = Comunidad::find($request->comunidad_id);
        if(Auth::id() == $comunidad->user_id){
            $request->merge(["estado_moderacion" => "aprobado"]);
        }
        else{
            $request->merge(["estado_moderacion" => "en revision"]);
        }
        $request->merge(["user_id" => Auth::Id()]);
        $evento = Evento::create($request->except('banner'));
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $ruta = $request->banner->store('','public');

            $archivo = new Image();
            $archivo->ubicacion = $ruta;
            $archivo->nombre_original = $request->banner->getClientOriginalName();
            $archivo->mime = $request->banner->getClientMimeType();
            $evento->imagen()->save($archivo);
        }
        return redirect()->route('comunidades.show',$comunidad);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento): View
    {
        Gate::authorize('view', $evento);
        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento): View
    {
        Gate::authorize('update', $evento);
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        Gate::authorize('update', $evento);
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            if($evento->imagen){
                Storage::disk('public')->delete($evento->imagen->ubicacion);
                $evento->imagen->delete();
            }
            $ruta = $request->banner->store('','public');

            $archivo = new Image();
            $archivo->ubicacion = $ruta;
            $archivo->nombre_original = $request->banner->getClientOriginalName();
            $archivo->mime = $request->banner->getClientMimeType();
            $evento->imagen()->save($archivo);
        }
        $evento->update($request->except('banner'));
        return redirect()->route('comunidades.show',$evento->comunidad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        Gate::authorize('delete', $evento);
        $comunidad = $evento->comunidad;
        if($evento->imagen){
            Storage::disk('public')->delete($evento->imagen->ubicacion);
            $evento->imagen->delete();
        }
        $evento->delete();
        return redirect()->route('comunidades.show',$comunidad);
    }

    public function aceptar(Evento $evento)
    {
        Gate::authorize('update', $evento);
        if($evento->comunidad->user_id != Auth::id()){
            return redirect()->route('comunidades.show',$evento->comunidad);
        }
        $evento->update(["estado_moderacion" => "aprobado"]);
        return redirect()->route('comunidades.show',$evento->comunidad);
    }

    public function rechazar(Evento $evento)
    {
        Gate::authorize('update', $evento);
        $evento->update(["estado_moderacion" => "rechazado"]);
        return redirect()->route('comunidades.show',$evento->comunidad);
    }

    public function registrar(Evento $evento)
    {
        Gate::authorize('register', $evento);
        if($evento->participantes->contains(Auth::user())){
            return redirect()->route('comunidades.show', $evento->comunidad);
        }
        Mail::to(Auth::user()->email)->send(new EventRegistered($evento));
        $evento->participantes()->attach(Auth::id());
        return redirect()->route('comunidades.show',$evento->comunidad);
    }

    public function desregistrar(Evento $evento)
    {
        if(!$evento->participantes->contains(Auth::user())){
            return redirect()->route('comunidades.show', $evento->comunidad);
        }
        $evento->participantes()->detach(Auth::id());
        return redirect()->route('comunidades.show',$evento->comunidad);
    }

    public function api_index(Comunidad $comunidad)
    {
        return EventoResource::collection($comunidad->eventos);
    }
}
