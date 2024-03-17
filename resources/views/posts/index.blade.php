<x-app-layout>
    <main class="flex flex-col items-center gap-6">
        <a href="{{route('posts.create')}}" class="text-red-500 self-start ml-5 mt-3">Crear post</a>
        @foreach ($posts as $post)
            <div class="post text-gray-100 py-5 px-7 border-gray-500 border rounded min-w-[300px] max-w-xl">
                <h1 class="text-xl">{{$post->titulo}}</h2>
                <p class="text-gray-300 text-sm">Autor: {{$post->user->name}}</p>
                <p class="text-gray-300 text-sm">Semestre: {{$post->semestre}}</p>
                <p class="text-white">{{$post->contenido}}</p>
                <div class="flex gap-2">
                    <a href="{{route('posts.edit',$post)}}"><img src="/edit.svg" alt="Modificar post"></a>
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button><img src="/delete.svg" alt="Borrar post"></button>
                    </form>
                </div>

                <form method="POST" action="{{route('comentarios.store')}}">
                <div class="w-full mt-3 mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="cuerpo" class="sr-only">Tu comentario:</label>
                        <textarea id="cuerpo" name="cuerpo" rows="1" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Escribe un comentario..." required /></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Crear un comentario
                        </button>
                    </div>
                </div>
                <a href="" class="text-gray-400 text-sm">Ver comentarios</a>
                </form>
            </div>  
    @endforeach
    </main>
</x-app-layout>