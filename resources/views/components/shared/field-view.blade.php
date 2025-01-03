@props([
    'label' => null,
    'value' => null,
    'class' => null,
    'labelClass' => null,
    'valueClass' => null,
])

<div {{ $attributes->merge(['class' => 'flex']) }}>
    <label class="form-control flex-1 {{ $labelClass }}">
        <span class="text-zinc-400 text-sm">{{ $label }}</span>
        <span @class([
            'text-zinc-700' => ! $valueClass,
            $valueClass => $valueClass,
        ])>
            {{ $value }}
        </span>
    </label>
</div>