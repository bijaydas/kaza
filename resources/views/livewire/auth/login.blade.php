<div class="h-screen flex items-center justify-center bg-gradient-to-tr from-purple-700 via-purple-600">
    <form wire:submit="submit" class="px-6 py-6 rounded-lg shadow-lg bg-white" action="#">
        <h1 class="text-4xl text-center my-4">Login</h1>
        <div>
            <x-form.input name="email" type="text" label="Email" wire:model="email"/>
            <x-form.input name="password" type="text" label="Password" wire:model="password"/>

            <a class="text-right block text-xs mt-3 hover:underline" href="#">Forgot password?</a>

            <div class="mt-3 form-control">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

            @if(session()->has('error'))
                <x-shared.alert type="alert-error" message="{{ session()->get('error') }}" />
            @endif
        </div>
    </form>
</div>
