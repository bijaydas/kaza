<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public function __construct(
        public string $until,
        public array $breadcrumbs = [],
    )
    {
        $this->{$this->until}();
    }

    private function users(): void
    {
        $this->breadcrumbs = [
            [
                'name' => 'Home',
                'url' => route('home'),
            ],
            [
                'name' => 'Control panel',
                'url' => route('control-panel'),
            ],
            [
                'name' => 'Users',
                'url' => route('users.index'),
            ]
        ];
    }

    private function home(): void
    {
        $this->breadcrumbs = [
            [
                'name' => 'Home',
                'url' => route('home'),
            ],
            [
                'name' => 'Control panel',
                'url' => route('control-panel'),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.breadcrumbs');
    }
}
