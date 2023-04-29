<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableHead extends Component
{
    public $columns = [];
    public $buttonText = '';
    public $buttonLink = '';

    /**
     * Create a new component instance.
     */
    public function __construct($columns, $buttonText, $buttonLink)
    {
        $this->columns = $columns;
        $this->buttonText = $buttonText;  
        $this->buttonLink = $buttonLink;  
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tableHead');
    }
}
