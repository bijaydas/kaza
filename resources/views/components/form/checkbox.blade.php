@props(['value' => '', 'label' => '', 'name' => '', 'model' => '', 'containerClass' => ''])

<div class="form-control {{ $containerClass }}">
    <div class="flex items-center space-x-2">
        <input
            wire:model="{{ $model }}"
            value="{{ $value }}"
            id="id_{{ $value }}"
            name="{{ $name }}"
            type="checkbox"
            class="checkbox checkbox-primary"
        />
        <label for="id_{{ $value }}" class="label-text">{{ $label }}</label>
    </div>
</div>
