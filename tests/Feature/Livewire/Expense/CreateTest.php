<?php

namespace Tests\Feature\Livewire\Expense;

use App\Livewire\Expense\Create;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Create::class)
            ->assertStatus(200);
    }
}
