@props(['breadcrumbsFor' => 'home'])

<x-layouts.root :title="$title">
    <div class="flex flex-col">
        <div class="flex-1 flex">
            @livewire('shared.side-nav')

            <div class="flex-1 px-3 relative">
                @livewire('shared.top-nav', ['breadcrumbsFor' => $breadcrumbsFor])

                {{-- !IMPORTANT: Every slot shoud be within Layouts/Section component --}}
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.root>
