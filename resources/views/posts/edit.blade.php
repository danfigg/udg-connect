<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
</head>
<body>
    <form action="{{route('posts.update',$post)}}" method="post">
        @csrf 
        @method('PUT')
        <div class="field">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo') ?? $post->titulo }}">
            @error('titulo')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="field">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido" cols="30" rows="10" >{{old('contenido') ?? $post->contenido}}</textarea>
            @error('contenido')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="field">
        <label for="semestre">Semestre:</label>
            <select name="semestre" id="semestre">
              <option value="1" @select(old('semestre')=={{$post->semestre}})>1</option>
              <option value="2" @select(old('semestre')=={{$post->semestre}})>2</option>
              <option value="3" @select(old('semestre')=={{$post->semestre}})>3</option>
              <option value="4" @select(old('semestre')=={{$post->semestre}})>4</option>
              <option value="5" @select(old('semestre')=={{$post->semestre}})>5</option>
              <option value="6" @select(old('semestre')=={{$post->semestre}})>6</option>
              <option value="7" @select(old('semestre')=={{$post->semestre}})>7</option>
              <option value="8" @select(old('semestre')=={{$post->semestre}})>8</option>
              <option value="9" @select(old('semestre')=={{$post->semestre}})>9</option>
              <option value="10" @select(old('semestre')=={{$post->semestre}})>10</option>
            <option value="all" @select(old('semestre')=={{$post->semestre}})>all</option>
            </select>
            @error('semestre')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Editar Post</button>
    </form>
</body>
</html>