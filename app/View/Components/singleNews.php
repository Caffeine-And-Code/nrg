<?php

namespace App\View\Components;

use App\Models\News;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class singleNews extends Component
{
    public News $newsItem;
    /**
     * Create a new component instance.
     */
    public function __construct(News $newsItem)
    {
        $this->newsItem = $newsItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.single-news', [
            'newsItem' => $this->newsItem
        ]);
    }
}
