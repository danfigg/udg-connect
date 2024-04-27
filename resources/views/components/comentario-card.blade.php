@php
   $vote = Auth::user()->votos()->where('votable_id',$comentario->id)->first();
   $type = $vote ? ($vote->estado=='positivo' ? 'like' : 'dislike') : 'none';
   $textIfLike = $type == 'like' ? 'text-red-800' : 'text-gray-300';
   $textIfDislike = $type == 'dislike' ? 'fill-red-700' : 'fill-gray-300'; 
   $isDislikeDisabled = $type=='dislike' ? 'disabled' : '';
   $isLikeDisabled = $type == 'like' ? 'disabled' : '';
@endphp
<div class="flex flex-col gap-2  dark:text-white dark:border dark:border-gray-400 px-4 py-4 min-w-[350px] max-w-[680px] w-full rounded-lg">
    <header class="flex gap-3">
        <div>
            @if($comentario->user->profile_photo_path===null)
                    <img src="https://ui-avatars.com/api/?name={{$comentario->user->name}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$comentario->user->name}}">
                @else
                    <img src="{{Storage::url($comentario->user->profile_photo_path)}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$comentario->user->name}}">
                @endif
        </div>
        <div class="flex flex-col">
            <a class="text-white">{{$comentario->user->name}}</a>
            <span class="text-gray-400">{{$comentario->created_at->diffForHumans()}}</span>
            <p class="mt-4">
                @if($comentario->user_id == auth()->id())
                    {{$comentario->cuerpo}}
                @elseif($comentario->trashed())
                    <span class="text-red-500 line-through">Deleted</span>
                @else
                    {{$comentario->cuerpo}}
                
                @endif
            </p>
        </div>
    </header>
    <div class="flex items-center gap-1 ml-3">
        <form action="{{route('comentarios.like',$comentario)}}" method="POST">
            @csrf 
            @method('PUT')
            <button class="flex items-center" {{$isLikeDisabled}}>
                <svg fill="none" viewBox="0 0 24 24"  class="w-[18px] h-4 mr-1 {{$textIfLike}}" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </button>
        </form>
        <span class="flex items-center">{{$comentario->sum_votos()}}</span>
        <form action="{{route('comentarios.dislike',$comentario)}}" method="POST">
            @csrf
            @method('PUT')
            <button class="flex" {{$isDislikeDisabled}}>
                <svg class="h-[17px] {{$textIfDislike}}  hover:fill-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24"><path d="M481-83Q347-218 267.5-301t-121-138q-41.5-55-54-94T80-620q0-92 64-156t156-64q45 0 87 16.5t75 47.5l-62 216h120l-34 335 114-375H480l71-212q25-14 52.5-21t56.5-7q92 0 156 64t64 156q0 48-13 88t-55 95.5q-42 55.5-121 138T481-83Zm-71-186 21-211H294l75-263q-16-8-33.5-12.5T300-760q-58 0-99 41t-41 99q0 31 11.5 62t40 70.5q28.5 39.5 77 92T410-269Zm188-48q111-113 156.5-180T800-620q0-58-41-99t-99-41q-11 0-22 1.5t-22 5.5l-24 73h116L598-317Zm110-363ZM294-480Z"/></svg>
            </button>
        </form>
    </div>
    <div class="flex gap-2">
        @if(!$comentario->trashed())
            @can('update',$comentario)
                <a href="{{route('comentarios.edit',$comentario)}}" class="hover:underline" title="Update">
                    <svg class="dark:fill-white hover:fill-blue-600 w-5" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" width="24"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                </a>
            @endcan
            @can('delete',$comentario)
                            <form action="{{route('comentarios.soft_delete',$comentario)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button class="flex items-center" title="Delete forever">
                                <svg class="fill-red-500 w-5 hover:fill-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            </button>
                            </form>
            @endcan
        @else
            @can('restore',$comentario)
                <form action="{{route('comentarios.restore',$comentario)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="flex items-center" title="Restore">
                        <svg class="dark:fill-white w-5" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" width="24"><path d="M440-320h80v-166l64 62 56-56-160-160-160 160 56 56 64-62v166ZM280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                    </button>
                </form>
            @endcan
            @can('forceDelete',$comentario)
                <form action="{{route('comentarios.force_delete',$comentario)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="flex items-center" title="Delete forever">
                        <svg  class="fill-red-500 w-5" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" width="24"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>                    
                    </button>
                </form>
            @endcan
        @endif
    </div>
</div>