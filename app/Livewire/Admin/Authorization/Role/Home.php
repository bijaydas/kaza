<?php

namespace App\Livewire\Admin\Authorization\Role;

use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function mount(): void
    {
        //$this->authorize('view-role');
    }

    public function render(): View
    {
        return view('livewire.admin.authorization.role.home')
            ->layoutData(['title' => 'Roles'])
            ->with('roles', Role::query()->get());
    }
}
