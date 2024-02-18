@extends('layouts.app')

@section('title', 'Crear')

@section('content')
    <h1>Crear comunidad</h1>

    <a href="{{ route('comunidades.index')}}">Back to index</a><br><br>

    <form action="{{ route('comunidades.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br>
        @error('nombre')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>
        @error('descripcion')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="reglas">Reglas</label>
        <textarea name="reglas" id="reglas" cols="30" rows="10"></textarea><br>
        @error('reglas')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="banner">Banner</label>
        <input type="file" name="banner" id="banner"><br>
        @error('banner')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="estado_comunidad">Estado de la comunidad</label>
        <select name="estado_comunidad" id="estatus">
            <option value="activo">Activa</option>
            <option value="inactivo">Inactiva</option>
        </select><br>
        @error('estatus')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <button type="submit">Crear</button>
    </form>
@endsection