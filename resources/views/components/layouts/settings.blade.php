<div class="section m-4 flex gap-4 settings">
    <div class="w-2/12 nav-container">
        <ul>
            <li><a class="{{ isActiveRoute(['settings.profile', 'settings.profile.edit']) }}" href="{{ route('settings.profile') }}">Profile</a></li>
            <li><a href="#">Email</a></li>
            <li><a href="#">Sessions</a></li>
        </ul>
    </div>

    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
