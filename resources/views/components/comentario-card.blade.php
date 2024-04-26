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