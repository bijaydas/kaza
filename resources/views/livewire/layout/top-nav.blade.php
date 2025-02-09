<div class="flex items-center justify-between border-b bg-zinc-50 py-2 px-3 top-nav">
    <form action="#" class="flex items-center space-x-1">
        <input type="text" class="input input-sm input-bordered" placeholder="Search">
        <button class="btn btn-sm btn-neutral">
            <x-heroicon-o-magnifying-glass class="w-4" />
        </button>
    </form>

    <div class="flex items-center">
        <button type="button" class="btn btn-sm btn-ghost">
            <x-heroicon-o-chat-bubble-bottom-center-text class="w-6 h-6" />
        </button>
        <button type="button" class="btn btn-sm btn-ghost">
            <x-heroicon-o-bell class="w-6" />
        </button>

        <div class="profile-dropdown relative"
             x-data="{ open: false }"
             x-on:click.outside="open = false"
             x-on:close.stop="open = false"
             x-on:keydown.escape.window="open = false"
        >

            <button class="flex items-center space-x-1 trigger"
                    type="button"
                    x-on:click="open = !open"
                    aria-expanded="true"
                    aria-haspopup="true"
            >
                <x-heroicon-o-user-circle class="w-8" />
                <span class="flex flex-col items-start text-xs">
                    <span>{{ $name }}</span>
                    @if($isAdmin)
                        <span>Admin</span>
                    @endif
                </span>
                <x-heroicon-o-chevron-down class="w-3" />
            </button>

            <div class="content"
                 x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
            >
                <ul>
                    <li>
                        <a href="{{ route('settings.profile') }}" class="item">
                            <x-heroicon-o-user class="w-6" />
                            <span>Your profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="item">
                            <x-heroicon-o-user-group class="w-6" />
                            <span>Manage members</span>
                        </a>
                    </li>

                    <li class="border-b my-2"></li>

                    <li>
                        <a href="#" class="item">
                            <x-heroicon-o-cog-6-tooth class="w-6" />
                            <span>Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="item">
                            <x-heroicon-o-question-mark-circle class="w-6" />
                            <span>Create a issue</span>
                        </a>
                    </li>

                    <li class="border-b my-2"></li>

                    <li>
                        <button class="item"
                                type="button"
                                @click="$dispatch('logout')"
                        >
                            <x-heroicon-o-arrow-left-on-rectangle class="w-6" />
                            <span>Logout</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
