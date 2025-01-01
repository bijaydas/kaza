<?php

namespace App\Livewire\Transactions;

use App\Models\ExpenseCategory;
use App\Services\Transaction;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $type = '0';

    #[Url]
    public string $category = '';

    private LengthAwarePaginator $transactions;

    public function mount(): void
    {
        $this->getTransactions();
    }

    private function getTransactions(): void
    {
        $this->transactions = (new Transaction(auth()->user()))->getAllTransactions(
            search: $this->search,
            type: $this->type,
            category: $this->category
        );
    }

    public function handleSearch(): void
    {
        $this->getTransactions();
    }

    public function render(): View
    {
        $this->getTransactions();
        return view('livewire.transactions.home')
            ->title(getTitle('Transactions'))
            ->with('categories', ExpenseCategory::all())
            ->with('transactions', $this->transactions);
    }
}
