<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comunidades') }}
        </h2>
    </x-slot>
    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="dark:text-white flex justify-center py-4 mt-3">
                    <a class="flex gap-2" href="{{ route('comunidades.create') }}">
                        <svg class="dark:fill-white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 -960 960 960"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                        Crear comunidad
                    </a>
                </section>
                <ul class="py-5 px-5">
                    @forelse ($comunidades as $comunidad)
                        <x-comunidad-info :comunidad='$comunidad' />
                    @empty
                        <p class="dark:text-white">Oops, no hay comunidades a las que puedas unirte.</p>
                    @endforelse
                </ul>    
            </div>
        </div>
    </div>
</x-app-layout>