@props(['label' => '', 'type' => '', 'value' => ''])

<div class="flex flex-col">
    <span class="text-zinc-400 text-xs uppercase">{{ $label }}</span>
    <div>
        <span @class([
            'px-1.5 py-0.5 text-zinc-200 rounded text-sm',
            'bg-green-700' => $type == 'success',
            'bg-red-700' => $type == 'error',
            'bg-yellow-700' => $type == 'warning',
            'bg-blue-700' => $type == 'info',
        ])>{{ $value }}</span>
    </div>
</div>
