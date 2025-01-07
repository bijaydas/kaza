<?php

namespace App\Livewire\Transactions;

use App\Enums\PaymentMethod;
use App\Livewire\Forms\TransactionForm;
use App\Models\ExpenseCategory;
use App\Services\Transaction;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    public TransactionForm $form;

    public string $transactionId = '';

    public function mount(string $id): void
    {
        $service = new Transaction(auth()->user());
        $transaction = $service->getTransaction($id);

        $this->transactionId = $id;

        $this->form->fill([
            'categoryId' => $transaction->expense_category_id,
            'amount' => $transaction->amount,
            'date' => $transaction->date,
            'paymentMethod' => $transaction->payment_method,
            'type' => $transaction->type,
            'description' => $transaction->description,
        ]);
    }

    public function save(): void
    {
        $this->form->update($this->transactionId);

        session()->flash('success', 'Expense updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.transactions.edit')
            ->with('categories', ExpenseCategory::all())
            ->with('paymentMethods', PaymentMethod::values())
            ->title(getTitle('Edit Expense'));
    }
}
