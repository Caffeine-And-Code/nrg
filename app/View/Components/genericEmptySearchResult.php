<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class genericEmptySearchResult extends Component
{
    public $nameToDisplay;
    public $goBackRoute;
    /**
     * Create a new component instance.
     */
    public function __construct(String $nameToDisplay,$goBackRoute)
    {
        $this->nameToDisplay = $nameToDisplay;
        $this->goBackRoute = $goBackRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.generic-empty-search-result');
    }
}
