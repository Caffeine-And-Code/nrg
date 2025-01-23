<?php

namespace App\View\Components;

use App\Models\Order;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToDoOrder extends Component
{
    public Order $order;
    /**
     * Create a new component instance.
     */
    public function __construct($order)
    {
        $this->order = $order;        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.to-do-order');
    }
}
