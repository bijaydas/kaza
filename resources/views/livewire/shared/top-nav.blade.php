<div class="flex justify-between items-center border-b mb-1">
    <x-shared.breadcrumbs until="{{ $breadcrumbsFor }}" />

    <div class="flex items-center">
        <form class="flex items-center space-x-3 py-2 px-2">
            <input
                type="search"
                class="input input-bordered input-sm"
                placeholder="Search..."
            />
            <button type="submit" class="btn btn-neutral btn-sm">
                <x-heroicon-o-magnifying-glass class="w-4" />
            </button>
        </form>

        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button">
                <button type="button" class="flex items-center space-x-1 text-zinc-500 px-2 py-1 rounded-md hover:bg-zinc-100">
                    <x-heroicon-o-user-circle class="w-8" />
                    <x-heroicon-m-chevron-down class="w-4" />
                </button>
            </div>

            <ul tabindex="0" class="menu dropdown-content z-[1] mt-3 w-52 bg-white border">
                <li>
                    <a href="#">
                        <x-heroicon-o-user class="w-4" />
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#">
                        <x-heroicon-o-cog-8-tooth class="w-4" />
                        Settings
                    </a>
                </li>
                <li class="divide-x"></li>
                <li>
                    <livewire:auth.logout-button />
                </li>
            </ul>
        </div>
    </div>
</div>
