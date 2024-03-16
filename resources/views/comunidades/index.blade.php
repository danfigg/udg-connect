<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
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
</body>
</html>
    
