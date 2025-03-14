<div class="px-4 py-2 page">
    @if ($breadcrumbs)
        <x-shared.breadcrumbs until="{{ $breadcrumbs }}" />
    @endif

    @if($title || $description)
        <div>
            <h2 class="text-2xl font-semibold text-zinc-800/80">{{ $title }}</h2>
            <p class="text-sm text-zinc-700">{{ $description }}</p>
        </div>
    @endif


    <div @class(['mt-4' => $title || $description])>
        {{ $slot }}
    </div>
</div>
