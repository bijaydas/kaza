<x-layouts.settings>
    <x-slot:title>Profile</x-slot:title>
    <x-slot:subtitle>View your profile</x-slot:subtitle>

    <div class="w-8/12 flex flex-col justify-between gap-4">
        <div class="content flex flex-col gap-4 py-4">
            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Name" value="{{ $user->fullName() }}" />
                <x-shared.view-field label="Email" value="{{ $user->email }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Date of birth" value="{{ $user->getDateOfBirth() }}" />
                <x-shared.view-field label="Anniversary Date" value="{{ $user->getDateOfAnniversary() }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Phone" value="{{ $user->getPhone() }}" />
                <x-shared.view-field label="Gender" value="{{ $user->getGender() }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Status" value="{{ $user->status }}" />
            </div>
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('settings.profile.edit') }}" class="btn btn-primary btn-sm">
                Edit profile
            </a>
        </div>
    </div>
</x-layouts.settings>
