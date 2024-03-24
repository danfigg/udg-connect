<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreatePost extends ModalComponent
{
    public $comunidad_id;
    public $post = null;
    public function render()
    {
        return view('livewire.create-post');
    }
}
