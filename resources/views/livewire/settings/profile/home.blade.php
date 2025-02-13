<x-layouts.settings>
    <div class="w-8/12 flex flex-col justify-between gap-4">
        <div class="content flex flex-col gap-4 px-4 py-4">
            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Name" value="{{ $user->fullName() }}" />
                <x-shared.view-field label="Email" value="{{ $user->email }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Date of birth" value="{{ $user->date_of_birth->format('Y-m-d') }}" />
                <x-shared.view-field label="Anniversary Date" value="{{ $user->anniversary_date->format('Y-m-d') }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Phone" value="{{ $user->phone }}" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-shared.view-field label="Gender" value="{{ $user->getGender() }}" />
                <x-shared.view-field label="Status" value="{{ $user->status }}" />
            </div>
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('settings.profile.edit') }}" class="btn btn-sm btn-primary rounded">
                Edit profile
            </a>
        </div>
    </div>
</x-layouts.settings>
