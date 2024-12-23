<div class="breadcrumbs text-sm text-gray-600">
    <ul>
        @foreach($breadcrumbs as $breadcrumb)
            <li>
                <a href="{{ $breadcrumb['url'] }}">
                    {{ $breadcrumb['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
