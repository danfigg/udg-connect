<div class="py-8 px-8 bg-gray-100 dark:bg-gray-900">
<form action="{{route('posts.store')}}" method="post" class="dark:text-white">
        @csrf 
        <div class="flex flex-col">
            <input type="hidden" name="comunidad_id" value="{{$comunidad_id}}">
            <label for="titulo">Titulo:</label>
            <input class="text-black" name="titulo" id="titulo" value="{{old('titulo')??$post->titulo??''}}">
            @error('titulo')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="contenido">Contenido:</label>
            <textarea class="text-black" name="contenido" id="contenido" cols="30" rows="5" >{{old('contenido')??$post->contenido??''}}</textarea>
            @error('contenido')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="semestre">Semestre:</label>
            <select class="text-black" name="semestre" id="semestre">
              @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" {{ isset($post['semestre']) && $post['semestre'] == $i ? 'selected' : '' }}>{{ $i }}</option>
              @endfor
              <option value="all" {{ isset($post['semestre']) && $post['semestre'] == 'all' ? 'selected' : '' }}>all</option>
            </select>
            @error('semestre')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="tags">Etiquetas</label>
            <input type="text" name="tags" id="tags" class="text-black" placeholder="#etiqueta#segunda-etiqueta" value="{{old('tags')??$post->tags??''}}">
        </div>
        <x-button class="mt-5">Crear Post</x-button>
    </form>
</div>
