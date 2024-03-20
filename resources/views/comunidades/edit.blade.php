<x-app-layout>
    <button class="my-3 mx-20 p-2.5 bg-gray-400 rounded-lg text-sm">
        <a href="{{ route('comunidades.index')}}">← Back to index</a>
    </button>
    <div class="my-2 mx-60 p-5 bg-gray-300 rounded-lg">
        <h1 class="font-serif font-bold text-2xl text-center mb-4">Editar comunidad</h1>

        <form action="{{ route('comunidades.update', $comunidad->id) }}" method="POST" class="space-y-3 mx-10">
            @csrf
            @method('PUT')
            <div class="flex space-x-3">
                <div class="w-1/2 flex flex-col">
                    <label for="nombre" class="mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="border rounded-md px-2 py-1 text-sm" value="{{ $comunidad->nombre }}">
                    @error('nombre')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="w-1/2 flex flex-col">
                    <x-label for="centro" :value="__('Centro')" class="mb-2" />
                    <select name="centro" id="centro" class="border rounded-md px-2 py-1 text-sm">
                        <option value="0">Seleccione un centro</option>
                        @foreach ($centros as $centro)
                            <option value="{{$centro->id}}">{{$centro->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="descripcion" class="mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" cols="20" rows="5" class="border rounded-md px-2 py-1 text-sm resize-none">{{ $comunidad->descripcion }}</textarea>
                @error('descripcion')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="reglas" class="mb-1">Reglas</label>
                <textarea name="reglas" id="reglas" cols="20" rows="5" class="border rounded-md px-2 py-1 text-sm resize-none">{{ $comunidad->reglas }}</textarea>
                @error('reglas')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-3">
                <div class="w-1/2 flex flex-col">
                    <label for="banner" class="mb-1">Banner</label>
                    <input type="file" name="banner" id="banner" class="border rounded-md px-2 py-1 text-sm">
                    @error('banner')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="w-1/2 flex flex-col">
                    <label for="estado_comunidad" class="mb-1">Estado de la comunidad</label>
                    <select name="estado_comunidad" id="estatus" class="border rounded-md px-2 py-1 text-sm">
                        <option value="activo">Activa</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                    @error('estado_comunidad')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-800 text-white font-bold py-2 px-4 rounded">Crear</button>
            </div>
        </form>
    </div>
</x-app-layout>
