<?php

namespace Tests\Feature\Livewire\Expense;

use App\Livewire\Expense\Home;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Home::class)
            ->assertStatus(200);
    }
}
