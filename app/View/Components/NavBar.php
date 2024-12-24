<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{

    public $title;
    public $imagePath;
    /**
     * Create a new component instance.
     */
    public function __construct($title)
    {
        $this->title = $title;
        if($title == "Orders" || $title == "Products"){
            $this->imagePath = "resources/imgs/Take_away.png";
        }else{
            $this->imagePath = "resources/imgs/{$title}.png";
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-bar');
    }
}