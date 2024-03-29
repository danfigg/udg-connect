<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoRequest;
use App\Models\Comunidad;
use App\Models\Evento;
use Illuminate\Http\Request;
USE Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        Evento::create($request->all());
        return redirect()->route('comunidades.show',$comunidad);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento): View
    {
        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento): View
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        if( Auth::id() != $evento->user_id){
            return redirect()->route('eventos.index');
        }
        $evento->update($request->all());
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        if( Auth::id() != $evento->user_id){
         return redirect()->route('eventos.index');
        }
        $evento->delete();
        return redirect()->route('eventos.index');
    }

    public function aceptar(Evento $evento)
    {
        if($evento->comunidad->user_id != Auth::id()){
            return redirect()->route('eventos.index');
        }
        $evento->update(["estado_moderacion" => "aprobado"]);
        return redirect()->route('eventos.index');
    }

    public function rechazar(Evento $evento)
    {
        if($evento->comunidad->user_id != Auth::id()){
            return redirect()->route('eventos.index');
        }
        $evento->update(["estado_moderacion" => "rechazado"]);
        return redirect()->route('eventos.index');
    }
}
