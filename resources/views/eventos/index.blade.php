<x-app-layout>
    <main class="flex flex-col items-center gap-6">
        <a href="{{ route('eventos.create') }}" class="text-red-500 self-start ml-5 mt-3">Crear evento</a>
        @foreach ($eventos as $evento)
            <div class="evento text-gray-100 py-5 px-7 border-gray-500 border rounded min-w-[300px] max-w-xl">
                <h1 class="text-xl">{{ $evento->nombre }}</h2>
                <p class="text-gray-300 text-sm">Descripción: {{ $evento->descripcion }}</p>
                <p class="text-gray-300 text-sm">Fecha y Hora: {{ $evento->fecha_hora_evento }}</p>
                <p class="text-white">Banner: {{ $evento->banner }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('eventos.edit', $evento) }}"><img src="/edit.svg" alt="Modificar evento"></a>
                    <form action="{{ route('eventos.destroy', $evento) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button><img src="/delete.svg" alt="Borrar evento"></button>
                    </form>
                </div>
            </div>
        @endforeach
    </main>
</x-app-layout>