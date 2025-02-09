<div class="flex-1 flex flex-col space-y-2">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-shared.alert type="alert-error" message="{{ $error }}" />
        @endforeach
    @endif

    @if(session()->has('message'))
        <x-shared.alert type="alert-success" message="{{ session('message') }}" />
    @elseif(session()->has('success'))
        <x-shared.alert type="alert-success" message="{{ session('success') }}" />
    @endif
</div>
