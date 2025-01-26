@props(['title', 'description'])

<div class="panel-section">
    <div class="bg-gray-100 px-5 py-4 border rounded-tr rounded-tl">
        @isset($title)
            <h2 class="title">{{ $title }}</h2>
        @endisset

        @isset($description)
            <p class="description">{{ $description }}</p>
        @endisset
    </div>

    <div class="px-5 py-3 bg-white rounded-br rounded-bl">
        {{ $slot }}
    </div>
</div>
