@props(['message' => 'Unauthorized access'])

<div class="flex items-center space-x-2 text-red-500 border border-red-500 rounded-md p-2 bg-red-100 text-sm">
    <div>
        <x-heroicon-o-exclamation-triangle class="w-6 h-6" />
    </div>

    <div>
        {{ $message }}
    </div>
</div>
