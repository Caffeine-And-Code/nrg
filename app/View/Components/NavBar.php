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
            $this->imagePath = "las la-shopping-bag";
        }elseif($title == "Account"){
            $this->imagePath = "las la-user";
        }
        else{
            $this->imagePath = "las la-cog";
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