@php
    if($comunidad->estado_comunidad == 'activo'){
        $status_color = 'bg-lime-800';
        $comunidad->estado_comunidad = "Activa";
    }else{
        $status_color = 'bg-red-500';
        $comunidad->estado_comunidad = "Inactiva";
    }

    $colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-indigo-500', 'bg-purple-500', 'bg-pink-500'];
    $banner_color = $colors[array_rand($colors)]; 
@endphp

<x-app-layout>
    <img src="{{ asset($comunidad->banner) }}" alt="{{$comunidad->nombre}} banner" class="w-full h-15px">
    <div class="flex justify-between items-center px-5 py-3">
        <div class="flex items-center">
            <h1 class="px-4 py-2 text-2xl font-bold">{{ $comunidad->nombre }}</h1>
            <div class="flex items-center">
                <div class="w-3 h-3 {{$status_color}} rounded-full mr-2"></div>
                <p>{{$comunidad->estado_comunidad}}</p>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                </svg>
                <p class="text-sm">{{ $comunidad->num_participantes }}</p>
            </div>
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                    onclick="Livewire.dispatch('openModal', { component: 'create-post', arguments: {comunidad_id:{{$comunidad->id}}, }})">Crear Post</button>
                    @livewire('wire-elements-modal')
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Unirse</button>
        </div>
    </div>

    <details class="px-4 py-4 border border-gray-300 bg-gray-200 rounded-md">
        <summary class="cursor-pointer">Detalles</summary>
        <div class="mt-2">
            <p class="mb-1"><span class="font-semibold">Descripción:</span> {{ $comunidad->descripcion }}</p>
            <p class="mb-1"><span class="font-semibold">Reglas:</span><br> {{ $comunidad->reglas }}</p>
        </div>
    </details>
</x-app-layout>