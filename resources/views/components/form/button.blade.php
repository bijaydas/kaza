@props([
    'primary' => false,
    'error' => false,
    'neutral' => false,
    'submitIcon' => false,
    'trashIcon' => false,
])

<button
    @class([
        'btn',
        'btn-sm',
        'rounded',
        'btn-primary' => $primary,
        'btn-neutral' => $neutral,
        'btn-error' => $error,
        'flex items-center' => $submitIcon,
    ])
    {{ $attributes }}
>
    {{ $slot }}

    @if($submitIcon)
        <x-heroicon-o-arrow-long-right class="w-4" />
    @endif

    @if($trashIcon)
        <x-heroicon-o-trash class="w-4" />
    @endif
</button>
