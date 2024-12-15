<div class="navbar border-b-2 roboto-regular bg-white">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">Kaza</a>
    </div>

    <div class="flex-none">
        <ul class="menu menu-horizontal">
            <li><a href="#">Control panel</a></li>
        </ul>
    </div>

    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button">
                <div class="btn btn-ghost">
                    <x-heroicon-o-user-circle class="w-8" />
                    <x-heroicon-m-chevron-down class="w-4" />
                </div>
            </div>

            <ul
                tabindex="0"
                class="menu dropdown-content z-[1] mt-3 w-52 shadow-xl"
            >
                <li><a>Profile</a></li>
                <li><a>Settings</a></li>
                <li>
                    <livewire:auth.logout-button />
                </li>
            </ul>
        </div>
    </div>
</div>