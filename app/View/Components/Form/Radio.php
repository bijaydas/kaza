<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.form.radio');
    }
}
