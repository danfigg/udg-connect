<?php

namespace App\View\Components;

use App\Models\Evento;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Evento $evento,
        public User $admin,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-card');
    }
}
