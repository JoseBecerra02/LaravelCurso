<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class componente extends Component
{
    public $mensaje;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->mensaje = "Hola desde el";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.componente');
    }
}
