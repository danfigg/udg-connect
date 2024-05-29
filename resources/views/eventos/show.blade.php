<x-app-layout>
    <h1 class="text-white text-xl mt-5 text-bold text-center">Participantes</h1>
    <main class="flex flex-col items-center gap-3 mt-3">
        @foreach ($evento->participantes as $participante)
            <article class="flex items-center gap-3">
                @if($evento->user->profile_photo_path)
                    <img src="{{Storage::url($evento->user->profile_photo_path)}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$evento->user->name}}">
                @else
                    <img src="https://ui-avatars.com/api/?name={{$evento->user->name}}" class="w-12 h-12 rounded-full" alt="¨Profile photo of {{$evento->user->name}}">
                 @endif
                <p class="text-white">{{ $participante->name }}</p>
            </article>
        @endforeach
    </main>
</x-app-layout>
