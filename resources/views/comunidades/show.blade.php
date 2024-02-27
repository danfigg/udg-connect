<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Comunidades</title>
</head>
<body>
    <a href="{{ route('comunidades.index') }}">Back to index</a><br><br>
    <h1>Comunidad</h1>
    <p>Nombre: {{ $comunidad->nombre }}</p>
    <p>Descripción: {{ $comunidad->descripcion }}</p>
    <p>Reglas: {{ $comunidad->reglas }}</p>
    <p>Estado: {{ $comunidad->estatus }}</p>
</body>
</html>

    
