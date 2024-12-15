<div class="flex flex-col space-y-2">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-shared.alert type="alert-error" message="{{ $error }}" />
        @endforeach
    @endif

    @if(session()->has('message'))
            <x-shared.alert type="alert-success" message="{{ session('message') }}" />
    @endif
</div>
