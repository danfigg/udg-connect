

<x-app-layout>
   <x-comunidad-banner :comunidad="$comunidad"/>

   <div id="button-container" class="py-8 px-6 flex justify-center flex-wrap gap-3">
      <button id="acerca" class="mx-6 px-4 py-2 bg-gray-600 text-white font-semibold rounded-3xl">Acerca de</button>
      <button id="conversacion" class="mx-6 px-4 py-2 bg-white text-blue-800 underline font-semibold rounded-3xl">Conversación</button>
      <button id="eventos" class="mx-6 px-4 py-2 bg-gray-600 text-white font-semibold rounded-3xl">Eventos</button>
   </div>

   <div class="flex-col" id="show_conversacion">
    @if ($comunidad->posts->isEmpty())
        <p class="dark:text-white text-black text-center">No existen conversaciones</p>
    @else
        @foreach ($comunidad->posts as $post)
            @if($post->estado_moderacion == 'aprobado')
                <x-post-show-card :post="$post" :admin="$comunidad->user"/>
            @elseif($post->estado_moderacion == 'en revision' && $comunidad->user_id == Auth::id())
                <x-post-show-card :post="$post" :admin="$comunidad->user" />
            @endif
        @endforeach
    @endif
</div>

   <div id="show_acerca" class="py-6 px-20 " style="display: none">    
      <div class="px-4 py-4 border w-11/12 mx-auto dark:bg-gray-900 dark:text-white border-gray-300 bg-gray-200 rounded-md">
         <div class="mt-2">
             <p class="mb-1"><span class="font-semibold">Descripción:</span><br> {{ $comunidad->descripcion }}</p>
             <p class="mb-1"><span class="font-semibold">Reglas:</span><br> {{ $comunidad->reglas }}</p>
             @can('addCareers',$comunidad)
                 <a href="{{route('comunidad.add_careers_form',$comunidad)}}" class="text-blue-700 hover:underline">Agregar carreras relacionadas</a>
             @endcan
             <ul>
                 @foreach($comunidad->carreras as $carrera)
                     <li  class="flex gap-3">
                         {{ $carrera->carrera->nombre }}
                         @can('addCareers',$comunidad)
                             <form action="{{route('comunidad.delete_career',[$comunidad,$carrera])}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button>
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 dark:fill-white" viewBox="0 0 448 512">
                                         <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                     </svg>
                                 </button>
                             </form>
                         @endcan
                     </li>
                 @endforeach
             </ul>
            </div>
        </div>
    </div>

    <div id="show_eventos" class="flex flex-col items-center w-full gap-3" style="display: none">
        @if ($comunidad->eventos->isEmpty())
            <p class="dark:text-white text-black text-center">No existen eventos</p>
        @else
            @foreach ($comunidad->eventos as $evento)
                <x-event-card :evento="$evento" :admin='$evento->comunidad->user'></x-event-card>
            @endforeach
        @endif
    </div>

    <script>
      const shareLinks = document.querySelectorAll('.share');
      shareLinks.forEach(shareLink => {
         shareLink.addEventListener('click', function(){
            const url = this.value;
            if(navigator.share){
               navigator.share({
                  title: 'Compartir UDG Connect Post',
                  text: 'Compartir UDG Connect Post',
                  url: url
               }).then(() => console.log('Compartido')).catch((error) => console.log('Error al compartir', error));
            }else{
               console.log('No se puede compartir');
            }
         });

        });
      
      var boton_conversacion = document.getElementById('conversacion');
      var div_conversacion = document.getElementById('show_conversacion');
      var boton_acerca = document.getElementById('acerca');
      var div_acerca = document.getElementById('show_acerca');
      var boton_eventos = document.getElementById('eventos');
      var div_eventos = document.getElementById('show_eventos');

      // Agregar un evento de clic al botón
      boton_conversacion.addEventListener('click', function() {
         // Cambiar el estilo del div para mostrarlo
         div_conversacion.style.display = 'flex';
         div_acerca.style.display = 'none';
         div_eventos.style.display = 'none';
      });

      boton_acerca.addEventListener('click', function() {
         // Cambiar el estilo del div para mostrarlo
         div_acerca.style.display = 'flex';
         div_conversacion.style.display = 'none';
         div_eventos.style.display = 'none';
      });

      boton_eventos.addEventListener('click', function() {
         // Cambiar el estilo del div para mostrarlo
         div_eventos.style.display = 'flex';
         div_acerca.style.display = 'none';
         div_conversacion.style.display = 'none';
      });

    const buttonContainer = document.getElementById('button-container');
    const buttons = buttonContainer.querySelectorAll('button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => {
                btn.classList.remove('bg-white', 'text-blue-800', 'underline');
                btn.classList.add('bg-gray-600', 'text-white');
            });

            button.classList.remove('bg-gray-600', 'text-white');
            button.classList.add('bg-white', 'text-blue-800', 'underline');
        });
    });
      
   </script>
</x-app-layout>