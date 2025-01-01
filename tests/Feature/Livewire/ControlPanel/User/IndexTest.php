<?php

namespace Tests\Feature\Livewire\ControlPanel\User;

use App\Livewire\ControlPanel\User\Index;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Index::class)
            ->assertStatus(200);
    }
}
