<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userDashboardMobile extends Component
{

    public $products;
    public $news;
    /**
     * Create a new component instance.
     */
    public function __construct($products,$news)
    {
        $this->products = $products;
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-dashboard-mobile');
    }
}
