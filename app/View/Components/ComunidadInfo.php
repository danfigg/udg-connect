<?php

namespace App\View\Components;

use App\Models\Comunidad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComunidadInfo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Comunidad $comunidad,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comunidad-info');
    }
}
