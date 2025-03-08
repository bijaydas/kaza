<x-layouts.settings>

    <x-slot:title>Edit profile</x-slot:title>
    <x-slot:subtitle>Change your profile</x-slot:subtitle>

    <form wire:submit="submit" class="w-8/12 flex flex-col justify-between gap-4">
        <div class="flex flex-col gap-4 px-4 py-4 section">
            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="form.firstName" name="first_name" label="First Name" />
                <x-form.input wire:model="form.lastName" name="last_name" label="Last Name" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="form.dateOfBirth" type="date" name="date_of_birth" label="Date of Birth" />
                <x-form.input wire:model="form.anniversaryDate" type="date" name="anniversary_date" label="Anniversary Date" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input wire:model="form.phone" name="phone" label="Phone" />
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <x-form.button primary>Save changes</x-form.button>
        </div>
        @include('shared.form-result')
    </form>
</x-layouts.settings>
