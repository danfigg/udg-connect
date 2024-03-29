<x-app-layout>
    <main class="flex flex-col items-center gap-6">
        <a href="{{ route('eventos.create') }}" class="text-red-500 self-start ml-5 mt-3">Crear evento</a>
        @foreach ($eventos as $evento)
            <x-event-card :evento="$evento" :admin='$evento->comunidad->user'></x-event-card>
        @endforeach
    </main>
</x-app-layout>