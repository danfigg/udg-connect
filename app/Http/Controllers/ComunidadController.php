<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ComunidadRequest;
use App\Models\Centro;
use Illuminate\Support\Facades\Auth;

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
        // Poner un valor por defecto para centro_carreras_id
        $request->merge(['centro_carreras_id' => 1]);
        Comunidad::create($request->all());
        return redirect()->route('comunidades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comunidad $comunidad): View
    {
        return view('comunidades.show', compact('comunidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comunidad $comunidad): View
    {
        return view('comunidades.edit', compact('comunidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComunidadRequest $request, Comunidad $comunidad): RedirectResponse
    {
        $comunidad->update($request->all()); 
        return redirect()->route('comunidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comunidad $comunidad): RedirectResponse
    {
        $comunidad->delete();
        return redirect()->route('comunidades.index');
    }
}
