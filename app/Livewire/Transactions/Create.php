<?php

namespace App\Livewire\Transactions;

use App\Enums\PaymentMethod;
use App\Livewire\Forms\TransactionForm;
use App\Models\ExpenseCategory;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public TransactionForm $form;

    public function mount(): void
    {
        $this->form->date = now()->format('Y-m-d');
    }

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->form->save();

        session()->flash('success', 'Expense created successfully.');
    }

    public function resetForm(): void
    {
        $this->form->reset();
    }

    public function render(): View
    {
        return view('livewire.transactions.create')
            ->with('categories', ExpenseCategory::all())
            ->with('paymentMethods', PaymentMethod::values())
            ->title(getTitle('Create Expense'));
    }
}
