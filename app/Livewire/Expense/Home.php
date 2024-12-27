<?php

namespace App\Livewire\Expense;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.expense.home')
            ->title(getTitle('Expense'));
    }
}
