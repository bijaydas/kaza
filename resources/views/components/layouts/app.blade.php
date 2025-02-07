<x-layouts.root :title="$title">
    <div class="flex-1 flex">
        @livewire('layout.side-nav')

        <div class="flex-1">
            @livewire('layout.top-nav')

            {{ $slot }}
        </div>
    </div>
</x-layouts.root>
