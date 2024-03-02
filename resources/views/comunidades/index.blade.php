@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <h1>Comunidades</h1>
    <a href="/">Index</a><br>
    <a href="{{ route('comunidades.create') }}">Crear comunidad</a>
    <ul>
        @forelse ($comunidades as $comunidad)
            <li>
                <a href="{{ route('comunidades.show', $comunidad->id) }}">{{ $comunidad->nombre }}</a><br>
                <a href="{{ route('comunidades.edit', $comunidad->id) }}"><img src="/edit.svg" alt="Modificar comunidad"></a>
                <form method="POST" action="{{ route('comunidades.destroy', $comunidad->id) }}">
                    @csrf
                    @method('DELETE')
                    <button><img src="/delete.svg" alt="Borrar comunidad"></button>
                </form>  
            </li>
        @empty
            <p>No data comunidades</p>
        @endforelse
    </ul>
@endsection