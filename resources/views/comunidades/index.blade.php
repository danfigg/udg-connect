@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <h1>Comunidades</h1>
    <a href="{{ route('comunidades.create') }}">Crear comunidad</a>
    <ul>
        @forelse ($comunidades as $comunidad)
            <li>
                <a href="{{ route('comunidades.show', $comunidad->id) }}">{{ $comunidad->nombre }}</a>
                <a href="{{ route('comunidades.edit', $comunidad->id) }}">Edit</a>
                <form method="POST" action="{{ route('comunidades.destroy', $comunidad->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                </form>  
            </li>
        @empty
            <p>No data comunidades</p>
        @endforelse
    </ul>
@endsection