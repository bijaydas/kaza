@props(['mainClass'])

<div class="px-4 py-2 {{ $mainClass }}">
    <h2 class="text-2xl font-semibold text-zinc-800/80">{{ $title }}</h2>
    <p class="text-sm text-zinc-700">{{ $description }}</p>

    <div class="bg-white rounded shadow-lg p-4 my-2">
        {{ $main }}
    </div>

    {{ $footer }}

    @include('shared.form-result')
</div>
