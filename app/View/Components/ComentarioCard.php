<?php

namespace App\View\Components;

use App\Models\Comentario;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComentarioCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Comentario $comentario,
        public User $admin
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comentario-card');
    }
}
