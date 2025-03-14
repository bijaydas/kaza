<?php

namespace App\Livewire\Admin\Authorization\Role;

use Illuminate\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;

class Edit extends Component
{
    public string $id = '';
    public array $selectedPermissions = [];

    public function mount(string $id): void
    {
        $this->id = $id;

        $this->selectedPermissions = Role::findOrFail($id)->permissions->pluck('id')->toArray();
    }

    public function save(): void
    {
        $permissions = collect($this->selectedPermissions)->map(fn ($item) => (int) $item)->toArray();

        Role::find($this->id)->syncPermissions($permissions);

        session()->flash('success', 'Role updated successfully.');
    }

    public function render(): View
    {
        $permissions = Cache::rememberForever('permissions', function () {
            return Permission::all();
        });

        return view('livewire.admin.authorization.role.edit')
            ->with('role', Role::find($this->id))
            ->with('permissions', $permissions)
            ->title('Edit Role')
            ->layoutData([
                'title' => 'Edit Role',
            ]);
    }
}
