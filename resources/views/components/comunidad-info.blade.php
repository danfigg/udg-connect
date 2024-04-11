@php
    if(strlen($comunidad->descripcion) > 20){
        $comunidad->descripcion = substr($comunidad->descripcion,0,20).'...';
    }

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

<li class="dark:text-white px-10 py-5 border border-gray-400 mt-4 flex flex-basis">
    <div class="flex-grow">
        <a class="text-lg" href="{{ route('comunidades.show', $comunidad->id) }}">{{ $comunidad->nombre }}</a><br>
        <div class="flex gap-2 items-center">
            <div class="w-3 h-3 {{$status_color}} rounded-full"> </div>
            <p>{{$comunidad->estado_comunidad}}</p>
        </div>
        <p class="text-sm dark:text-gray-300">Creador: {{$comunidad->user->name}}</p>
        <p class="text-sm dark:text-gray-300">{{ $comunidad->descripcion }}</p>
        <p class="text-sm dark:text-gray-300">Participantes: {{ $comunidad->usuarios()->count() }}</p>
        <div class="flex gap-3">
            @can('update', $comunidad)
                <a href="{{ route('comunidades.edit', $comunidad->id) }}"><img src="/edit.svg" alt="Modificar comunidad"></a>
            @endcan
            @can('delete', $comunidad)
                <form method="POST" action="{{ route('comunidades.destroy', $comunidad->id) }}">
                    @csrf
                    @method('DELETE')
                    <button><img src="/delete.svg" alt="Borrar comunidad"></button>
                </form>
            @endcan
            </div>
    </div>
    @if($comunidad->banner)
        <img class="w-7/12" src="{{ asset('storage/'.$comunidad->banner) }}" alt="Banner de la comunidad {{$comunidad->nombre}}">
    @else
        <div class="{{$banner_color}} w-7/12">
        </div>
    @endif
</li>
