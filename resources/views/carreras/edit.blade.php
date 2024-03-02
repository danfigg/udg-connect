<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar carrera</title>
</head>
<body>
    <form action="{{route('carreras.update',$carrera)}}" method="post">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="nombre">Nombre de Carrera:</label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
            @error('nombre')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Editar Carrera</button>
    </form>
</body>
</html>