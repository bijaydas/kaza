<x-layouts.settings>

    <x-slot:title>Edit email</x-slot:title>
    <x-slot:subtitle>Change your email address</x-slot:subtitle>

    <form wire:submit="update" class="w-8/12 flex flex-col justify-between gap-4">
        <div class="content flex flex-col gap-4 px-4 py-4">
            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="email" name="email" label="New email" />
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <x-form.button primary>Save changes</x-form.button>
            @include('shared.form-result')
        </div>
    </form>
</x-layouts.settings>
