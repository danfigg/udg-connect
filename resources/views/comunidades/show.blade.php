@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <a href="{{ route('comunidades.index') }}">Back to index</a><br><br>
    <h1>Comunidad</h1>
    <p>Nombre: {{ $comunidad->nombre }}</p>
    <p>Descripción: {{ $comunidad->descripcion }}</p>
    <p>Reglas: {{ $comunidad->reglas }}</p>
    <p>Numero de participantes: {{ $comunidad->num_participantes }}</p>
    <p>Estado: {{ $comunidad->estado_comunidad }}</p>
@endsection
