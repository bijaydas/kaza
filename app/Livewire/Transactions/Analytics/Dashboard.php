<?php

namespace App\Livewire\Transactions\Analytics;

use App\Services\TransactionGraph;
use Livewire\Component;

class Dashboard extends Component
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

    public function render()
    {
        return view('livewire.transactions.analytics.dashboard')
            ->layoutData([
                'title' => 'Transaction Analytics'
            ]);
    }
}
