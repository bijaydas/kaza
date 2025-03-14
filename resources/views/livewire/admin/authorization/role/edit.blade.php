<x-layouts.page title="Edit Role" description="Edit">
    @can('update_role')
        <form wire:submit="save" class="grid grid-cols-1 gap-4 w-1/3">
            <div class="section px-4 py-4">
                <h2 class="text-xl font-semibold">{{ $role->name }}</h2>

                @foreach($permissions as $permission)
                    <x-form.checkbox
                        model="selectedPermissions"
                        value="{{ $permission->id }}"
                        label="{{ $permission->name }}"
                        name="permissions"
                        containerClass="my-2"
                    />
                @endforeach
            </div>

            <div>
                <x-form.button primary type="submit">Save</x-form.button>
            </div>


            @include('shared.form-result')
        </form>
    @elsecannot('update_role')
        <x-access-denied />
    @endcannot
</x-layouts.page>
