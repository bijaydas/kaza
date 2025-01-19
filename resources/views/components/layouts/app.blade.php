<x-layouts.root :title="$title">
    <div class="min-h-screen flex bg-gray-200">
        @livewire('shared.side-nav')

        <div class="flex-1 px-3">
            @livewire('shared.top-nav', ['paginationFor' => $paginationFor])

            {{-- !IMPORTANT: Every slot shoud be within Layouts/Section component --}}
            {{ $slot }}
        </div>
    </div>
</x-layouts.root>
