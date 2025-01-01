@props([
    'amount' => 0,
    'type' => 'credit',
])

<span>
    @if($type == 'credit')
        <span class="text-green-700">+{{ number_format($amount, 2) }}</span>
    @else
        <span class="text-red-700">-{{ number_format($amount, 2) }}</span>
    @endif
</span>