<x-app-layout>
    <x-comunidad-banner :comunidad="$comunidad"/>
    <div>
        @foreach ($comunidad->posts as $post)
            @if($post->estado_moderacion == 'aprobado')
                <x-post-show-card :post="$post" :admin="$comunidad->user"/>
            @elseif($post->estado_moderacion == 'en revision' && $comunidad->user_id == Auth::id())
                <x-post-show-card :post="$post" :admin="$comunidad->user" />
            @endif
        @endforeach
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
   </script>
</x-app-layout>