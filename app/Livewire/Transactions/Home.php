<?php

namespace App\Livewire\Transactions;

use App\Models\ExpenseCategory;
use App\Services\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public array $transactionViewDetails = [
        'id' => '',
        'amount' => '',
        'category' => '',
        'paymentMethod' => '',
        'paymentMethodName' => '',
        'type' => '',
        'description' => '',
        'date' => '',
    ];

    #[Url]
    public string $search = '';

    #[Url]
    public string $type = '0';

    #[Url]
    public string $category = '';

    #[Url]
    public string $timeframe = '0';

    private LengthAwarePaginator $transactions;

    public bool $showTransactionViewModal = false;

    public function mount(): void
    {
        $this->getTransactions();
    }

    private function getTransactions(): void
    {
        $this->transactions = (new Transaction(auth()->user()))->getAllTransactions(
            search: $this->search,
            type: $this->type,
            category: $this->category,
            timeframe: $this->timeframe
        );
    }

    public function handleSearch(): void
    {
        $this->getTransactions();
    }

    public function viewTransaction(string $transactionId): void
    {
        $result = (new Transaction(auth()->user()))->getTransaction($transactionId);

        $this->transactionViewDetails = [
            'id' => $result->id,
            //'amount' => $result->amount,
            'paymentMethod' => $result->payment_method,
            'paymentMethodName' => $result->paymentMethodName(),
            'type' => $result->type,
            'category' => $result->expenseCategory->name,
            'description' => trim($result->description),
            'date' => $result->date,
        ];

        if ($result->type === 'debit') {
            $this->transactionViewDetails['amount'] = '- '.$result->amount;
        } else {
            $this->transactionViewDetails['amount'] = '+ '.$result->amount;
        }

        $this->showTransactionViewModal = true;
    }

    public function render(): View
    {
        $this->getTransactions();

        return view('livewire.transactions.home')
            ->layout('components.layouts.app', ['paginationFor' => 'transactions'])
            ->title(getTitle('Transactions'))
            ->with('categories', ExpenseCategory::all())
            ->with('transactions', $this->transactions);
    }
}
