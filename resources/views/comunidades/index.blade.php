<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comunidades') }}
        </h2>
    </x-slot>
    <a href="{{ route('comunidades.create') }}">Crear comunidad</a>
    <ul>
        @forelse ($comunidades as $comunidad)
            <li>
                <a href="{{ route('comunidades.show', $comunidad->id) }}">{{ $comunidad->nombre }}</a><br>
                <a href="{{ route('comunidades.edit', $comunidad->id) }}"><img src="/edit.svg" alt="Modificar comunidad"></a>
                <form method="POST" action="{{ route('comunidades.destroy', $comunidad->id) }}">
                    @csrf
                    @method('DELETE')
                    <button><img src="/delete.svg" alt="Borrar comunidad"></button>
                </form>
            </li>
        @empty
            <p>No data comunidades</p>
        @endforelse
    </ul>
</x-app-layout>