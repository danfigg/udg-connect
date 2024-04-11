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
    <div class="my-2">
        @if($comunidad->banner)
            <img src="{{ asset($comunidad->banner) }}" alt="{{$comunidad->nombre}} banner" class="w-full h-[35px] dark:text-white">
        @else
            <div class="{{$banner_color}} w-full h-[35px]">
            </div>
        @endif
    </div>
    
    <div class="dark:text-white flex justify-between flex-wrap space-evenly items-center px-5 py-3">
        <div class="flex items-center">
            <h1 class="px-4 py-2 text-2xl font-bold">{{ $comunidad->nombre }}</h1>
            <div class="flex items-center">
                <div class="w-3 h-3 {{$status_color}} rounded-full mr-2"></div>
                <p>{{$comunidad->estado_comunidad}}</p>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
        @can('delete', $comunidad)
            <form method="POST" action="{{ route('comunidades.destroy', $comunidad->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 dark:fill-white" viewBox="0 0 448 512">
                        <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                    </svg>
                </button>
            </form>
        @endcan
        @can('update', $comunidad)
            <a class="flex items-center space-x-2" href="{{ route('comunidades.edit', $comunidad->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 dark:fill-white" viewBox="0 0 512 512">
                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                </svg>
            </a>
        @endcan
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 dark:fill-white" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                </svg>
                <p class="text-sm">{{ $comunidad->usuarios()->count() }}</p>
            </div>
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                    onclick="Livewire.dispatch('openModal', { component: 'create-post', arguments: {comunidad_id:{{$comunidad->id}}}})">Crear Post
            </button>
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    onclick="Livewire.dispatch('openModal', { component: 'create-event', arguments: {comunidad_id:{{$comunidad->id}}}})">Crear Evento
            </button>
                @livewire('wire-elements-modal')
            <form action="{{ route('comunidad.follower', $comunidad->id) }}" method="post">
                @csrf
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Unirse
                </button>
            </form>
        </div>
    </div>
    
    <div class="px-6">
        <details class="px-4 py-4 border dark:bg-gray-900 dark:text-white border-gray-300 bg-gray-200 rounded-md">
            <summary class="cursor-pointer">Detalles</summary>
            <div class="mt-2">
                <p class="mb-1"><span class="font-semibold">Descripción:</span> {{ $comunidad->descripcion }}</p>
                <p class="mb-1"><span class="font-semibold">Reglas:</span><br> {{ $comunidad->reglas }}</p>
            </div>
        </details>
    </div>