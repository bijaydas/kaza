<x-layouts.page>
    <div class="grid grid-cols-4 gap-4">
        <div class="flex items-center gap-x-2 relative px-3 py-2 rounded-md bg-white shadow-md border border-gray-200 transform hover:scale-[1.02] transition-all">
            <div class="w-1/12">
                <x-heroicon-s-user-group />
            </div>
            <div>
                <h2>Users</h2>
                <p class="text-zinc-500 text-xs">Manage your users here</p>
            </div>
            <a class="absolute bg-black/10 -inset-0" href="{{ route('admin.users') }}"></a>
        </div>
    </div>
</x-layouts.page>
