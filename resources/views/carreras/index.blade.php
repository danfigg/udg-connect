<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras</title>
</head>
<body>
    @foreach ($carreras as $carrera)
    <div class="carrera">
        <h1 class="title">{{$carrera->nombre}}</h1>
        <form action="{{route('carreras.destroy',$carrera)}}" method="POST">
                @csrf
                @method('DELETE')
                <button><img src="/delete.svg" alt="Borrar carrera"></button>
            </form>
            <a href="{{route('carreras.edit',$carrera)}}"><img src="/edit.svg" alt="Modificar carrera"></a>
    </div>
    @endforeach
</body>
</html>