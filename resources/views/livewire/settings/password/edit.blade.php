<x-layouts.settings>

    <x-slot:title>Edit password</x-slot:title>
    <x-slot:subtitle>Change your profile</x-slot:subtitle>

    <form wire:submit="updatePassword" class="w-8/12 flex flex-col justify-between gap-4">
        <div class="content flex flex-col gap-4 px-4 py-4 section">

            <div class="grid grid-cols-2 gap-4">
                <x-form.input autofocus wire:model="current_password" name="current_password" label="Current password" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="new_password" name="new_password" label="New Password" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="password_confirmation" name="password_confirmation" label="Confirm password" />
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <x-form.button primary>Save changes</x-form.button>
            @include('shared.form-result')
        </div>
    </form>
</x-layouts.settings>
