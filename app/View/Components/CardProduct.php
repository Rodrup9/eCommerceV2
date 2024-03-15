<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardProduct extends Component
{
    public $img;
    /**
     * Create a new component instance.
     */
    public function __construct($img="")
    {
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
