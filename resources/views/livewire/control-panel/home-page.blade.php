<div class="w-11/12 mx-auto my-4">
    <div>
        <x-shared.breadcrumbs until="home" />
    </div>

    <div class="mt-2 grid grid-cols-6">
        <div class="px-2 py-2 flex items-center space-x-2 relative shadow-sm bg-white text-gray-500 transition-transform hover:translate-y-1">
            <div class="w-16 text-gray-400">
                <x-heroicon-o-user-group />
            </div>
            <div class="flex-grow">
                <h2 class="text-gray-500 font-semibold">Users</h2>
                <p class="text-xs">Manager all users</p>
            </div>
            <a class="absolute -inset-0" href="{{ route('users.index') }}"></a>
        </div>
    </div>
</div>
