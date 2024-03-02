<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowGraphComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public $visible = false; // Flag to control component visibility

    public function showComponent()
    {
        $this->visible = true; // Make component visible on button click
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-graph-component');
    }
}
