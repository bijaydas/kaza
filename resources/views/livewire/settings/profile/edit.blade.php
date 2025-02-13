<x-layouts.settings>

    <x-slot:title>Edit profile</x-slot:title>
    <x-slot:subtitle>Change your profile</x-slot:subtitle>

    <form wire:submit="updateProfile" class="w-8/12 flex flex-col justify-between gap-4">
        <div class="content flex flex-col gap-4 px-4 py-4">
            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="first_name" name="first_name" label="First Name" />
                <x-form.input wire:model="last_name" name="last_name" label="Last Name" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="date_of_birth" type="date" name="date_of_birth" label="Date of Birth" />
                <x-form.input wire:model="anniversary_date" type="date" name="anniversary_date" label="Anniversary Date" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="phone" name="phone" label="Phone" />
            </div>

        </div>

        <div class="flex items-center space-x-4">
            <x-form.button primary>Save changes</x-form.button>
            @include('shared.form-result')
        </div>
    </form>
</x-layouts.settings>
