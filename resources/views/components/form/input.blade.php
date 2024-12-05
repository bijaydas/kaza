<div class="form-control">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <input type="{{ $type }}" class="input input-bordered w-full input-primary @error($name) input-error @enderror" placeholder="{{ $placeholder }}" {{ $attributes }} />

    @error($name)
        <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
        </div>
    @enderror
</div>