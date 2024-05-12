<x-app-layout>
    <main>
        @foreach ($posts as $post)
            <x-post-show-card :post="$post"/>
        @endforeach
    </main>
</x-app-layout>