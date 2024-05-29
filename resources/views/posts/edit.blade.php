<x-app-layout>
<div class="flex flex-col items-center w-full mt-6">
  <h1 class="text-xl text-white">Editar Post</h1>
  <div class="py-8 px-8 bg-gray-100 dark:bg-gray-900 w-[55%] min-w-[340px]">
  <form action="{{route('posts.update',$post)}}" method="post" class="dark:text-white w-full">
          @csrf
          @method('PUT')
          <div class="flex flex-col mt-1">
              <input type="hidden" class="mt-2" name="comunidad_id" value="{{$post->comunidad_id}}">
              <label for="titulo">Titulo:</label>
              <input class="text-black" name="titulo" id="titulo" value="{{old('titulo')??$post->titulo??''}}">
              @error('titulo')
                <small class="error">{{ $message }}</small>
              @enderror
          </div>
          <div class="flex flex-col">
              <label for="contenido" class="mt-3">Contenido:</label>
              <textarea class="text-black" name="contenido" id="contenido" cols="30" rows="5" >{{old('contenido')??$post->contenido??''}}</textarea>
              @error('contenido')
                <small class="error">{{ $message }}</small>
              @enderror
          </div>
          <div class="flex flex-col">
              <label for="semestre" class="mt-3">Semestre:</label>
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
            <label for="tags">Etiquetas:</label>
            <input type="text" name="tags" id="tags" class="text-black" value="{{old('tags')??$post->tags??''}}">
          </div>
          <x-button class="mt-5">Editar Post</x-button>
      </form>
  </div>
</div>
</x-app-layout>