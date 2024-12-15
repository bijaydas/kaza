<div class="h-screen flex items-center justify-center bg-gradient-to-tr from-purple-700 via-purple-600">
    <form wire:submit="submit" class="px-6 py-6 rounded-lg shadow-lg bg-white" action="#">
        <h2 class="text-3xl font-semibold">Login</h2>
        <p class="text-sm leading-8 text-gray-500">Enter your credentials to the portal.</p>
        <div class="mt-4">
            <x-form.input name="email" type="text" label="Email" wire:model="email"/>
            <x-form.input name="password" type="password" label="Password" wire:model="password"/>

            <a class="text-right block text-xs mt-3 hover:underline" href="#">Forgot password?</a>

            <div class="mt-3 form-control">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

            @if($errors->any())
                <div class="mt-4">
                    @foreach($errors->all() as $error)
                        <x-shared.alert type="alert-error" message="{{ $error }}" />
                    @endforeach
                </div>
            @endif
        </div>
    </form>
</div>
