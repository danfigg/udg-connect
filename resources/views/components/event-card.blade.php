<div class="w-full lg:w-1/3 p-4 dark:text-white" data-path="0.0.3.1">
    <a href="#" data-path="0.0.3.1.0">
    <div class="border dark:border-gray-100 border-gray-600 hover:border-purple-400 transition duration-200 rounded-2xl h-full" data-path="0.0.3.1.0.0">
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
        @if($evento->imagen!=null)
        <img class="absolute top-0 left-0 w-full h-full object-cover rounded-t-2xl" src="{{asset('storage/' . $evento->imagen->ubicacion)}}" alt="" data-config-id="auto-img-4-2" data-path="0.0.3.1.0.0.0.2">
        @else
            <div class="absolute top-0 left-0 w-full h-full object-cover rounded-t-2xl bg-[#530031]"></div>
        @endif
    </div>
    <div class="p-6" data-path="0.0.3.1.0.0.1">
        <a class="dark:text-gray-200 text-gray-500 hover:text-white" href="{{route('comunidades.show',$evento->comunidad)}}">comunidad/{{$evento->comunidad->nombre}}</a>
        <h2 class="font-bold font-heading mb-2" data-config-id="auto-txt-15-2" data-path="0.0.3.1.0.0.1.0">{{$evento->nombre}}</h2>
        <div class="flex items-center gap-2 flex-wrap mb-4" data-path="0.0.3.1.0.0.1.1">
            <p class="dark:text-gray-200 text-gray-500 text-sm" data-config-id="auto-txt-16-2" data-path="0.0.3.1.0.0.1.1.0">{{$evento->date()}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none" data-config-id="auto-svg-11-2" data-path="0.0.3.1.0.0.1.1.1"><circle cx="2" cy="2" r="2" fill="#D1D1D1" data-path="0.0.3.1.0.0.1.1.1.0"></circle></svg>
            <p class="dark:text-gray-200 text-gray-500 text-sm" data-config-id="auto-txt-17-2" data-path="0.0.3.1.0.0.1.1.2">{{$evento->range_hours()}} ({{$evento->duracion_horas}}h)</p>
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
                    <a href="{{ route('eventos.edit', $evento) }}">
                        <svg
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="w-8 h-7 text-black dark:text-white"
                        >
                          <!-- El código del SVG que quieres usar -->
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path
                              fill-rule="evenodd"
                              clip-rule="evenodd"
                              d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                              fill="currentColor"
                            />
                          </g>
                        </svg>
                      </a>
                        <form action="{{ route('eventos.destroy', $evento) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><img class="pl-1" src="/delete.svg" alt="Borrar evento"></button>
                        </form>
                    @endif
        </div>
        @if($admin->id == Auth::id() && $evento->estado_moderacion == 'en revision')
        <div class="mt-4 flex gap-1">
            <form action="{{route('evento.aceptar',$evento)}}" method="POST">
               @csrf
               @method('PUT')
               <x-button>Aceptar</x-button>
            </form>
            <form action="{{route('evento.rechazar',$evento)}}" method="POST">
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