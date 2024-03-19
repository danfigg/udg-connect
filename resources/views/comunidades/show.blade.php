<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("$comunidad->nombre") }}
        </h2>
    </x-slot>
    <div class="dark:text-white">
        <h1>Comunidad</h1>
        <p>Nombre: {{ $comunidad->nombre }}</p>
        <p>Descripción: {{ $comunidad->descripcion }}</p>
        <p>Reglas: {{ $comunidad->reglas }}</p>
        <p>Numero de participantes: {{ $comunidad->num_participantes }}</p>
        <p>Estado: {{ $comunidad->estado_comunidad }}</p>
    </div>
</x-app-layout>