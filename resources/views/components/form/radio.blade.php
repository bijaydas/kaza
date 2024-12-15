@props(['label', 'name', 'value', 'containerClass' => ''])

<div class="form-control {{ $containerClass }}">
    <label class="label cursor-pointer space-x-2 btn btn-ghost">
        <span class="label-text">{{ $label }}</span>
        <input {{ $attributes }} type="radio" name="{{ $name }}" class="radio" value="{{ $value }}" />
    </label>
</div>
