<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <form action="{{route('posts.store')}}" method="post">
        @csrf 
        <div class="field">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
            @error('titulo')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="field">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido" cols="30" rows="10" >{{old('contenido')}}</textarea>
            @error('contenido')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="field">
            <label for="semestre">Semestre:</label>
            <input type="number" name="semestre" id="semestre" value="{{old('semestre')}}" min=1 max=10>
            @error('semestre')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Crear Post</button>
    </form>
</body>
</html>