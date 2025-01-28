<div class="flex justify-between items-center mb-1 top-nav">
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

        <div x-data="{ isOpen: false }" class="relative flex items-center profile-dropdown">

            <button type="button" @click="isOpen = !isOpen" class="btn btn-sm btn-ghost trigger">
                <x-heroicon-o-user-circle class="w-7" />
                <x-heroicon-m-chevron-down class="w-4" />
            </button>

            <div class="content" x-show="isOpen" @click.outside="isOpen = false" x-transition>
                <livewire:auth.logout-button />
            </div>
        </div>
    </div>
</div>
