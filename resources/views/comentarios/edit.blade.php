<x-app-layout>
    <div class="dark:text-white flex flex-col items-center">
        <a href="{{route('posts.comentarios',['post' => $comentario->comentable_id])}}" class="self-start ml-3 mt-3">← Regresar a comentarios</a>
        <form action="{{route('comentarios.update',$comentario)}}" method="POST" class="flex flex-col items-center">
            @csrf
            @method('PUT')
            <div class="flex flex-col w-full min-w-[350px] max-w-[600px]">
                <label for="cuerpo">Editar comentario:</label>
                <textarea name="cuerpo" id="cuerpo" cols="30" rows="5" class="text-black">{{old('cuerpo')??$comentario->cuerpo??''}}</textarea>
            </div>
            <x-button class="mt-2 text-center">Actualizar</x-button>
            @error('cuerpo')
                <p class="text-red-500 w-full max-w-[350px]">{{$message}}</p>
            @enderror
        </form>
    </div>
</x-app-layout>
