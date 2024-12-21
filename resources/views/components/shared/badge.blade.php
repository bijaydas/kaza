@props(['error' => false, 'success' => false])

<span @class([
    'text-white',
    'px-1.5',
    'py-1',
    'rounded-xl',
    'bg-red-600' => $error,
    'bg-green-600' => $success,
])>{{ $slot }}</span>