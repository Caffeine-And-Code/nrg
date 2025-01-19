<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\ProductType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddAndEditProductForm extends Component
{
    public $product;
    public $types;
    /**
     * Create a new component instance.
     */
    public function __construct(Product $product = null)
    {
        $this->product = $product;
        $this->types = ProductType::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add-and-edit-product-form');
    }
}
