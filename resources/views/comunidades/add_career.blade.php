<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-white text-xl text-center">Agregar carreras</h1>
        <form action="{{route('comunidad.store_careers',$comunidad)}}" method="POST" class="w-full max-w-[700px] min-w-[350px]">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <label for="centro_carrera_id" class="dark:text-white">Carrera:</label>
                <select name="centro_carrera_id" id="centro_carrera_id">
                    @foreach($carreras as $carrera)
                        <option value="{{$carrera->id}}">{{$carrera->carrera->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center"><button class="px-4 py-3 mt-3 dark:bg-blue-900 rounded-lg dark:text-white">Agregar carrera</button></div>
        </form>
        @error('centro_carrera_id')
            <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
</x-app-layout>