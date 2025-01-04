<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use App\Services\TransactionGraph;

class Graph extends Component
{
    public string $customYear = '2024';
    public $customYearData;

    public function mount()
    {
        $this->customYearData = collect();
    }

    public function sinceBeginning()
    {
        return (new TransactionGraph(auth()->user()))->sinceBeginning();
    }

    public function fetchCustomYear(): void
    {
        $this->customYearData = (new TransactionGraph(auth()->user()))->customYear($this->customYear);
    }

    public function handleCustomYearChange(): void
    {

    }
    
    public function render(): View
    {
        return view('livewire.transactions.graph')
            ->with('sinceBeginningData', $this->sinceBeginning())
            ->with('customYearData', $this->customYearData)
            ->title(getTitle('Transactions Graph'));
    }
}
