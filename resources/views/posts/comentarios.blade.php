<x-app-layout>
    <div class="flex flex-col items-center mt-5 ml-5">
            <header class="self-start">
                <a class="text-lg dark:text-white" href="{{route('comunidades.show',$post->comunidad_id)}}">← Regresar a comunidad {{$post->comunidad->name}}</a>
            </header>
            <x-post-show-card :post="$post" :admin="$post->comunidad->user"/>
            <form action="{{route('comentarios.store',$post)}}" method="post" class="mt-4 flex w-full min-w-[290px] max-w-[590px] gap-2">
                @csrf
                <input type="text" class="flex-1" name="cuerpo" id="cuerpo" placeholder="Comentario" value="{{old('cuerpo')??''}}">
                <x-button class="mt-2">Comentar</x-button>
            </form>
            @error('cuerpo')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <main class="mt-4 w-9/12 ">
                <h1 class="text-2xl font-semibold dark:text-white text-start">Comentarios</h1>
                <div class="flex flex-col gap-3 items-center">
                    @foreach ($post->comentarios()->withTrashed()->get() as $comentario)
                        <x-comentario-card :comentario="$comentario" :admin="$post->comunidad->user"/>
                    @endforeach
                </div>
            </main>
    </div>
</x-app-layout>