<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <x-nav-auth></x-nav-auth>
    <a href="{{route('posts.create')}}">Crear post</a>
    @foreach ($posts as $post)
        <div class="post">
            <h2>{{$post->titulo}}</h2>
            <p>{{$post->contenido}}</p> 
            <p>Semestre: {{$post->semestre}}</p>
            <form action="{{route('posts.destroy',$post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button><img src="/delete.svg" alt="Borrar post"></button>
            </form>
            <a href="{{route('posts.edit',$post)}}"><img src="/edit.svg" alt="Modificar post"></a>
            
        </div>
    @endforeach
</body>
</html>