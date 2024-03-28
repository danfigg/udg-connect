<div class="py-8 px-8 bg-gray-100 dark:bg-gray-900">
    <form action="{{route('eventos.store')}}" method="post" class="dark:text-white">
            @csrf 
            <div class="flex flex-col">
                <input type="hidden" name="evento_id" value="{{$comunidad_id}}">
                <label for="nombre">Nombre:</label>
                <input class="text-black" name="nombre" id="nombre" value="{{old('nombre')??$evento->nombre??''}}">
                @error('nombre')
                  <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="descripcion">Descripción:</label>
                <textarea class="text-black" name="descripcion" id="descripcion" cols="30" rows="5" >{{old('descripcion')??$evento->descripcion??''}}</textarea>
                @error('descripcion')
                  <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="banner">Banner:</label>
                <input type="file" name="banner" id="banner">
                @error('banner')
                  <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="fecha_hora_evento">Fecha:</label>
                <input type="date" name="fecha_hora_evento" id="fecha_hora_evento" value="{{old('fecha_hora_evento')??$evento->fecha_hora_evento??''}}">
                @error('fecha_hora_evento')
                  <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <x-button class="mt-5">Crear Evento</x-button>
    </form>
</div>
    