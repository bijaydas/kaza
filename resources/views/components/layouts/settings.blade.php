<div class="m-4 flex gap-4 settings">
    <div class="w-2/12 nav-container">
        <ul>
            <li><a wire:navigate class="{{ isActiveRoute(['settings.profile', 'settings.profile.edit']) }}" href="{{ route('settings.profile') }}">Profile</a></li>
            <li><a wire:navigate class="{{ isActiveRoute(['settings.email', 'settings.email.edit']) }}" href="{{ route('settings.email') }}">Email</a></li>
            <li><a wire:navigate class="{{ isActiveRoute(['settings.password.edit']) }}" href="{{ route('settings.password.edit') }}">Change password</a></li>
        </ul>
    </div>

    <div class="flex-1">

        <div class="mb-2">
            <h2 class="text-3xl font-semibold text-zinc-700/80">{{ $title }}</h2>
            <h2 class="text-zinc-500 text-sm">{{ $subtitle }}</h2>
        </div>

        {{ $slot }}
    </div>
</div>
