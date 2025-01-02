<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class genericSearchBar extends Component
{
    public $searchRoute;
    public $buttonRoute;
    public string $mode;

    /**
     * Create a new component instance.
     */
    public function __construct($searchRoute, $buttonRoute , $mode)
    {
        $this->searchRoute = $searchRoute;

        if ($mode === 'admin' || $mode === 'client') {
            $this->mode = $mode;
        } else {
            Log::error("Invalid mode for navigationFooter component");
            throw new \Exception("Invalid mode for navigationFooter component");
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.generic-search-bar');
    }
}
