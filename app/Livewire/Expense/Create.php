<?php

namespace App\Livewire\Expense;

use App\Enums\ExpenseStatusEnum;
use App\Models\ExpenseCategory;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use App\Livewire\Forms\ExpenseForm;
use App\Enums\ExpensePaymentMethodEnum;

class Create extends Component
{
    public ExpenseForm $form;

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
        return view('livewire.expense.create')
            ->with('categories', ExpenseCategory::all())
            ->with('paymentMethods', ExpensePaymentMethodEnum::values())
            ->with('expense_statuses', ExpenseStatusEnum::values())
            ->title(getTitle('Create Expense'));
    }
}
