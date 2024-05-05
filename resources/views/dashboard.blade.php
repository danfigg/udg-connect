<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 pt-5 pb-5 shadow-xl sm:rounded-xl">
                
                @if(count($comunidades) > 0)
                    @foreach($comunidades as $comunidad)
                        @foreach($comunidad->posts as $post)
                            <x-post-show-card :post="$post" :admin="$comunidad->user"/>
                        @endforeach
                    @endforeach
                @else
                    <h1 class="dark:text-white text-lg text-center">¡Participa o únete a las <a class="font-extrabold text-amber-500 underline hover:text-amber-300 hover:no-underline" href="{{route('comunidades.index')}}">comunidades!</a></h1>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
