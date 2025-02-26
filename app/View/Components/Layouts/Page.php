<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Page extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public ?string $breadcrumbs = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.layouts.page');
    }
}
