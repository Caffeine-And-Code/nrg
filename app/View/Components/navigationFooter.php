<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class navigationFooter extends Component
{
    public string $mode;

    public function __construct(string $mode)
    {
        if ($mode === 'admin' || $mode === 'client') {
            $this->mode = $mode;
        } else {
            Log::error("Invalid mode for navigationFooter component");
            throw new \Exception("Invalid mode for navigationFooter component");
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.navigation-footer');
    }
}
