<div class="flex justify-between items-center">
    <x-shared.breadcrumbs until="{{ $breadcrumbsFor }}" />

    <div>
        <form action="" class="flex items-center space-x-3 py-2 px-2">
            <input
                type="search"
                class="input input-bordered input-sm"
                placeholder="Search..."
            />
            <button type="submit" class="btn btn-neutral btn-sm">
                <x-heroicon-o-magnifying-glass class="w-4" />
            </button>
        </form>
    </div>
</div>
