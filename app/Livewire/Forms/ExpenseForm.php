<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExpenseForm extends Form
{
    #[Validate('required')]
    public string $categoryId = '';

    #[Validate('required|numeric')]
    public string $amount = '';

    #[Validate('required|date')]
    public string $date = '';

    #[Validate('required')]
    public string $paymentMethod = 'upi';

    public string $description = '';

    public string $status = 'approved';

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->validate();

        auth()->user()->expense()->create([
            'category_id' => $this->categoryId,
            'amount' => $this->amount,
            'date' => $this->date,
            'payment_method' => $this->paymentMethod,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        $this->reset();
    }
}
