<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use App\Services\TransactionGraph;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class ExpenseForYearGraph extends Component
{
    public string $year = '';

    public function mount(): void
    {
        $this->year = date('Y');

        $this->dispatch('backend-updated', [
            'data' => $this->expensesForYear(),
            'forYear' => $this->year,
        ]);
    }

    public function expensesForYear(): Collection
    {
        return (new TransactionGraph(auth()->user()))->yearExpenses($this->year);
    }

    #[On('expenses-by-year-frontend-updated')]
    public function expensesByYearFrontendUpdated(): void
    {
        $this->dispatch('backend-updated', [
            'data' => $this->expensesForYear(),
            'forYear' => $this->year,
        ]);
    }

    public function render(): View
    {
        return view('livewire.shared.expense-for-year-graph')
            ->with('data', $this->expensesForYear());
    }
}
