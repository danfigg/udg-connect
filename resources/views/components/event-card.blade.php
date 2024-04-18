<div class="w-full lg:w-1/3 p-4 dark:text-white" data-path="0.0.3.1">
    <a href="#" data-path="0.0.3.1.0">
    <div class="border border-gray-100 hover:border-purple-400 transition duration-200 rounded-2xl h-full" data-path="0.0.3.1.0.0">
        <div class="relative" style="height: 220px;" data-path="0.0.3.1.0.0.0">
            <div class="absolute top-0 left-0 z-10" data-path="0.0.3.1.0.0.0.0">
                <svg class="rounded-tl-2xl" xmlns="http://www.w3.org/2000/svg" width="154" height="154" viewBox="0 0 154 154" fill="none" data-config-id="auto-svg-9-2" data-path="0.0.3.1.0.0.0.0.0">
                    <path d="M-35 79.9324V153.361C-35 153.714 -34.7141 154 -34.3615 154H16.62C16.9724 154 17.2585 153.714 17.2585 153.361V94.299C17.2585 55.5087 55.5087 17.2585 94.299 17.2585H153.361C153.714 17.2585 154 16.9724 154 16.62V-34.3615C154 -34.7139 153.714 -35 153.361 -35H79.9324C16.4572 -35 -35 16.4572 -35 79.9324Z" fill="#530031" data-path="0.0.3.1.0.0.0.0.0.0"></path>
                </svg>
        </div>
        <div class="absolute bottom-0 right-0 z-10" data-path="0.0.3.1.0.0.0.1">
            <svg xmlns="http://www.w3.org/2000/svg" width="152" height="153" viewBox="0 0 152 153" fill="none" data-config-id="auto-svg-10-2" data-path="0.0.3.1.0.0.0.1.0">
                <path d="M189 74.0676V0.638514C189 0.286054 188.714 0 188.361 0H137.38C137.028 0 136.742 0.286054 136.742 0.638514V59.701C136.742 98.4913 98.4914 136.742 59.701 136.742H0.638514C0.286054 136.742 0 137.028 0 137.38V188.361C0 188.714 0.286054 189 0.638514 189H74.0676C137.543 189 189 137.543 189 74.0676Z" fill="#530031" data-path="0.0.3.1.0.0.0.1.0.0"></path>
            </svg>
        </div>
        @if($evento->banner!=null)
        <img class="absolute top-0 left-0 w-full h-full object-cover rounded-t-2xl" src="{{$evento->banner}}" alt="" data-config-id="auto-img-4-2" data-path="0.0.3.1.0.0.0.2">
        @else
            <div class="absolute top-0 left-0 w-full h-full object-cover rounded-t-2xl bg-[#530031]"></div>
        @endif
    </div>
    <div class="p-6" data-path="0.0.3.1.0.0.1">
        <a class="text-gray-300 hover:text-white" href="{{route('comunidades.show',$evento->comunidad)}}">comunidad/{{$evento->comunidad->nombre}}</a>
        <h2 class="font-bold font-heading mb-2" data-config-id="auto-txt-15-2" data-path="0.0.3.1.0.0.1.0">{{$evento->nombre}}</h2>
        <div class="flex items-center gap-2 flex-wrap mb-4" data-path="0.0.3.1.0.0.1.1">
            <p class="text-gray-300 text-sm" data-config-id="auto-txt-16-2" data-path="0.0.3.1.0.0.1.1.0">{{$evento->date()}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none" data-config-id="auto-svg-11-2" data-path="0.0.3.1.0.0.1.1.1"><circle cx="2" cy="2" r="2" fill="#D1D1D1" data-path="0.0.3.1.0.0.1.1.1.0"></circle></svg>
            <p class="text-gray-300 text-sm" data-config-id="auto-txt-17-2" data-path="0.0.3.1.0.0.1.1.2">{{$evento->range_hours()}} ({{$evento->duracion_horas}}h)</p>
        </div>
        <details>
            <summary>
                {{$evento->short_description()}}
            </summary>
            <p>
                {{$evento->descripcion}}
            </p>
        </details>
        <div class="flex  mt-2">
                    @if($evento->user->id==Auth::id())
                        <a href="{{ route('eventos.edit', $evento) }}"><img src="/edit.svg" alt="Modificar evento"></a>
                        <form action="{{ route('eventos.destroy', $evento) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><img src="/delete.svg" alt="Borrar evento"></button>
                        </form>
                    @endif
        </div>
        @if($admin->id == Auth::id() && $post->estado_moderacion == 'en revision')
        <div class="mt-4 flex gap-1">
            <form action="{{route('post.aceptar',$post)}}" method="POST">
               @csrf
               @method('PUT')
               <x-button>Aceptar</x-button>
            </form>
            <form action="{{route('post.rechazar',$post)}}" method="POST">
               @csrf
               @method('PUT')
               <x-button>Rechazar</x-button>
            </form>
        </div>
        @endif
        </div>
        @can('register',$evento)
            @if(!$evento->participantes->contains(Auth::id()))
            <div class="mb-4 flex justify-center">
                <form action="{{route('evento.registrar',[$evento])}}" method="POST">
                    @csrf
                    <x-button>Registrarse</x-button>
                </form>
            </div>
            @else
            <div class="mb-4 flex justify-center">
                <form action="{{route('evento.desregistrar',[$evento])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button>Desregistrarse</x-button>
                </form>
            </div>
            @endif
        @endcan
    </div>
    </a>
</div>