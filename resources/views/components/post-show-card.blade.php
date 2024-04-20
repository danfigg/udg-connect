@php
   $isLike = Auth::user()->votos()->where('post_id',$post->id)->where('estado','positivo')->first();
   $isDislike = Auth::user()->votos()->where('post_id',$post->id)->where('estado','negativo')->first();
   $textIfLike = $isLike ? 'text-red-800' : 'text-gray-300';
   $textIfDislike = $isLike == null && $isDislike  ? 'fill-red-700' : 'fill-gray-300'; 
   $isDislikeDisabled = $isLike == null && $isDislike ? 'disabled' : '';
   $isLikeDisabled = $isLike ? 'disabled' : '';
@endphp
<!-- component -->
<!-- post card -->
<div id="{{'post-'.$post->id}}" class="flex dark:border dark:border-gray-400 bg-white shadow-lg rounded-lg mx-4 md:mx-auto mt-5 max-w-md md:max-w-2xl dark:bg-gray-900 dark:text-white"><!--horizantil margin is just for display-->
<div class="flex gap-6 items-start px-4 py-6">
   @if($post->user->profile_photo_path)
      <img src="{{Storage::url($post->user->profile_photo_path)}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$post->user->name}}">
   @else
      <img src="https://ui-avatars.com/api/?name={{$post->user->name}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$post->user->name}}">
   @endif
   <div>
         <a href="{{route('comunidades.show',$post->comunidad)}}" class="dark:text-gray-400 hover:underline text-sm">comunidad/{{$post->comunidad->nombre}}</a>
         <div class="flex flex-col  justify-between">
            <h2 class="text-lg font-semibold dark:text-white text-gray-900 -mt-1">{{$post->user->name}}</h2>
            <small class="text-sm ">{{$post->created_at->format('F j, Y, g:i a')}}</small>
         </div>  
        <small class="text-sm">Semestre: {{$post->semestre}}</small>
         <div class="flex gap-2">
            @foreach($post->etiquetas as $etiqueta)
               <a href="{{route('etiqueta.posts',$etiqueta)}}" class="hover:underline text-green-300">#{{$etiqueta->nombre}}</a>
            @endforeach
         </div>
        <h1 class="text-lg">{{$post->titulo}}</h1>
        <p class="mt-3  text-sm">
            {{$post->contenido}}
         </p>
         <div class="mt-4 flex items-center">
            <div class="flex mr-2  text-sm items-center gap-1">
               <div class="hover:text-red-800 {{$textIfLike}} flex items-center">
                   <form action="{{route('post.like',$post)}}" method="POST">
                     @csrf 
                     @method('PUT')
                      <button class="flex items-center" {{$isLikeDisabled}}>
                         <svg fill="none" viewBox="0 0 24 24"  class="w-[18px] h-4 mr-1 " stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                          </svg>
                      </button>
                   </form>
                   <span class="flex items-center">{{$post->sum_votos()}}</span>
               </div>
               <form action="{{route('post.dislike',$post)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <button class="flex" {{$isDislikeDisabled}}>
                     <svg class="h-[17px] {{$textIfDislike}}  hover:fill-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24"><path d="M481-83Q347-218 267.5-301t-121-138q-41.5-55-54-94T80-620q0-92 64-156t156-64q45 0 87 16.5t75 47.5l-62 216h120l-34 335 114-375H480l71-212q25-14 52.5-21t56.5-7q92 0 156 64t64 156q0 48-13 88t-55 95.5q-42 55.5-121 138T481-83Zm-71-186 21-211H294l75-263q-16-8-33.5-12.5T300-760q-58 0-99 41t-41 99q0 31 11.5 62t40 70.5q28.5 39.5 77 92T410-269Zm188-48q111-113 156.5-180T800-620q0-58-41-99t-99-41q-11 0-22 1.5t-22 5.5l-24 73h116L598-317Zm110-363ZM294-480Z"/></svg>
                  </button>
               </form>
            </div>
            <div class="flex text-sm mr-8 items-center gap-2">
               <div class="flex items-center hover:text-blue-600">
                   <a href="{{route('posts.comentarios',$post)}}">
                      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                      </svg>
                   </a>
                   <span>{{$post->comentarios()->count()}}</span>
               </div>
               <div class="flex">
                  @can('update',$post)
                  <a href="{{route('posts.edit',$post)}}" class="flex items-center">
                     <svg class="dark:fill-white hover:fill-blue-600 h-4" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" width="24"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                  </a>
                  @endcan
                    @can('delete',$post)
                        <form action="{{route('posts.destroy',$post)}}" method="POST">
                              @csrf
                              @method('DELETE')
                           <button class="flex items-center">
                              <svg class="fill-red-500 w-4 hover:fill-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                           </button>
                        </form>
                    @endcan
                </div>
            </div>
            <button value="{{route('comunidades.show',$post->comunidad).'#post-'.$post->id}}" class="flex share  text-sm mr-4 hover:text-green-600 dark:active:text-green-400 active:text-green-900">
               <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1 " stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
               <span>share</span>
            </button>
        </div>
        @if($post->estado_moderacion == 'en revision')
        @can('canAcceptOrDeny',$post)
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
         @endcan
        @endif
      </div>
   </div>
</div>