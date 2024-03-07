<div class="flex">
    <ul>
    <li class="">Home</li>
    <form action="{{route('logout')}}" method="post" class="hidden" x-data>
        @csrf 
        <a href="{{route('logout')}}" 
        @click.prevent="$root.submit();">Log out</a>
    </ul>  
    </form>
    {{-- <a href="{{route('logout')}}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit()">Logout</a>
    </ul> --}}

    @livewireScripts
</div>