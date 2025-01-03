<div role="alert" class="alert {{ $type }}">

    @switch($type)
        @case('alert-success')
            <x-heroicon-o-check-circle class="w-6" />
            @break
        @case('alert-error')
            <x-heroicon-o-exclamation-triangle class="w-6" />
            @break
    @endswitch
    <span>{{ $message }}</span>
</div>

