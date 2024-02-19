@extends('layouts.app')

@section('title', 'Editar')

@section('content')
    <h1>Editar comunidad</h1>

    <a href="{{ route('comunidades.index')}}">Back to index</a><br><br>

    <form action="{{ route('comunidades.update', $comunidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ $comunidad->nombre }}"><br>
        @error('nombre')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="20" rows="5">{{ $comunidad->descripcion }}</textarea><br>
        @error('descripcion')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="reglas">Reglas</label>
        <textarea name="reglas" id="reglas" cols="20" rows="5">{{ $comunidad->reglas }}</textarea><br>
        @error('reglas')
            <p style="color: red">{{ $message }}</p>
        @enderror

        {{-- <label for="banner">Banner</label>
        <input type="file" name="banner" id="banner" value="{{ $comunidad->banner }}"><br>
        @error('banner')
            <p style="color: red">{{ $message }}</p>
        @enderror --}}

        <label for="estado_comunidad">Estado de la comunidad</label>
        <select name="estado_comunidad" id="estatus">
            <option value="activo" {{ $comunidad->estado_comunidad == 'activo' ? 'selected' : '' }}>Activa</option>
            <option value="inactivo" {{ $comunidad->estado_comunidad == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select><br>
        @error('estado_comunidad')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <button type="submit">Editar</button>
    </form>
@endsection