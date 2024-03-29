<x-app-layout>
    <div class="flex flex-col items-center w-full mt-2">
      <h1 class="text-xl text-black dark:text-white">Editar Evento</h1>
      <div class="py-8 px-8 bg-gray-100 dark:bg-gray-900 w-[55%] min-w-[340px]">
      <form action="{{route('eventos.update',$evento)}}" method="post" class="dark:text-white w-full">
        @csrf
        @method('PUT')
            <div class="flex flex-col mt-1">
                <input type="hidden" class="mt-2" name="comunidad_id" value="{{$evento->comunidad_id}}">
                <label for="nombre">Nombre</label>
                <input class="text-black" name="nombre" id="nombre" value="{{old('nombre')??$evento->nombre??''}}">
                @error('nombre')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="descripcion" class="mt-3">Descripción:</label>
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
                <label for="fecha_hora_evento">Fecha y hora:</label>
                <input type="datetime-local" class="text-black" name="fecha_hora_evento" id="fecha_hora_evento" value="{{ $evento->fecha_hora_evento ? date('Y-m-d\TH:i', strtotime($evento->fecha_hora_evento)) : '' }}">
                @error('fecha_hora_evento')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>                                 
            <div class="flex justify-center">
                <x-button class=" mt-5">Editar Post</x-button>
            </div>
          </form>
      </div>
    </div>
    </x-app-layout>