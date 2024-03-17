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
            <select name="semestre" id="semestre">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="all">all</option>
            </select>
            @error('semestre')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Crear Post</button>
    </form>
</body>
</html>