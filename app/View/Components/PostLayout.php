<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $date;
    public function __construct($title = "DEFAULT",$date="DEFAULT")
    {
        $this->title = $title;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-layout');
    }
}
