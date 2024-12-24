<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.shared.badge');
    }
}
