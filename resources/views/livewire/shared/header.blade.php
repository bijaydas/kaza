<div class="navbar border-b-2 roboto-regular bg-white">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">Kaza</a>
    </div>

    <div class="flex-none">
        <ul class="menu menu-horizontal">
            <li><a href="{{ route('control-panel') }}">Control panel</a></li>
        </ul>
    </div>

    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button">
                <button type="button" class="flex items-center space-x-1 text-zinc-500 px-2 py-1 rounded-md hover:bg-zinc-100">
                    <x-heroicon-o-user-circle class="w-8" />
                    <x-heroicon-m-chevron-down class="w-4" />
                </button>
            </div>

            <ul tabindex="0" class="menu dropdown-content z-[1] mt-3 w-52 bg-white border">
                <li class="divide-x"></li>
                <li>
                    <livewire:auth.logout-button />
                </li>
            </ul>
        </div>
    </div>
</div>