<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreateEvent extends ModalComponent
{
    public $comunidad_id;
    public $evento = null;
    public function render()
    {
        return view('livewire.create-event');
    }
}
