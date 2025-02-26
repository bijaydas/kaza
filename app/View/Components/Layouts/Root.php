<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Root extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('components.layouts.root');
    }
}
