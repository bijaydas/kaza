<?php

namespace App\Livewire\Transactions;

use App\Services\TransactionGraph;
use Illuminate\View\View;
use Livewire\Component;

class Graph extends Component
{
    public string $year = '0';

    public function mount(): void
    {
        $this->year = date('Y');
    }


    public function sinceBeginning()
    {
        return (new TransactionGraph(auth()->user()))->sinceBeginning();
    }

    public function render(): View
    {
        return view('livewire.transactions.graph')
            ->with('sinceBeginningData', $this->sinceBeginning())
            ->layout('components.layouts.app', [
                'paginationFor' => 'transactions',
            ])
            ->title(getTitle('Transactions Graph'));
    }
}
