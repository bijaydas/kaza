@props(['containerClass' => '', 'required' => false])

<div class="form-control {{ $containerClass }}">
    <div class="label">
        <span class="label-text">{{ $label }} @if($required) <sup class="text-red-700 text-sm">*</sup> @endif</span>
    </div>

    {{ $slot }}

    @error($name)
    <div class="label">
        <span class="label-text-alt text-red-600">{{ $message }}</span>
    </div>
    @enderror
</div>
