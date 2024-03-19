<div class="py-8 px-8 bg-gray-100 dark:bg-gray-900">
<form action="{{route('posts.store')}}" method="post" class="dark:text-white">
        @csrf 
        <div class="flex flex-col">
            <input type="hidden" name="comunidad_id" value="{{$comunidad_id}}">
            <label for="titulo">Titulo:</label>
            <input class="text-black" ="text" name="titulo" id="titulo" value="{{old('titulo')}}">
            @error('titulo')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="contenido">Contenido:</label>
            <textarea class="text-black" name="contenido" id="contenido" cols="30" rows="5" >{{old('contenido')}}</textarea>
            @error('contenido')
              <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="semestre">Semestre:</label>
            <select class="text-black" name="semestre" id="semestre">
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
        <x-button class="mt-5">Crear Post</x-button>
    </form>
</div>
