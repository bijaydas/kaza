<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    #[Validate('required')]
    public string $categoryId = '';

    #[Validate('required|numeric')]
    public string $amount = '';

    #[Validate('required|date')]
    public string $date = '';

    #[Validate('required')]
    public string $paymentMethod = 'upi';

    #[Validate('required')]
    public string $type = 'debit';

    public string $description = '';

    /**
     * @throws ValidationException
     */
    public function create(): void
    {
        $this->validate();

        auth()->user()->transactions()->create([
            'expense_category_id' => $this->categoryId,
            'amount' => $this->amount,
            'date' => $this->date,
            'payment_method' => $this->paymentMethod,
            'type' => $this->type,
            'description' => $this->description,
        ]);

        $this->reset();
    }

    public function update(string $transactionId): void
    {
        $this->validate();

        auth()->user()
            ->transactions()
            ->where('id', $transactionId)
            ->update([
                'expense_category_id' => $this->categoryId,
                'amount' => $this->amount,
                'date' => $this->date,
                'payment_method' => $this->paymentMethod,
                'type' => $this->type,
                'description' => $this->description,
            ]);
    }
}
