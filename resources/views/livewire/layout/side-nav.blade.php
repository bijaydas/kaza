<div class="sidenav roboto-regular">
    <div>
        <div class="logo-container">
            <a href="/" title="Kaza">
                <img src="{{ asset('/logo.png') }}" alt="Kaza logo" class="w-24 mx-auto opacity-60 hover:opacity-80" />
            </a>
        </div>

        <nav class="nav-container">
            <div class="section">
                <h3 class="title">Transactions</h3>

                <ul>
                    @foreach(getRoutes('transactions') as $route)
                        <li>
                            <a href="{{ $route['path'] }}">
                                <span class="w-5">
                                    {{ svg($route['icon']) }}
                                </span>
                                <span>
                                    {{ $route['name'] }}
                                    @if(!$route['is_active'])
                                        <sup class="bg-zinc-800 text-zinc-200 px-0.5 rounded">Inactive</sup>
                                    @endif
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <div class="section">
            <h3 class="title">System</h3>
            <ul>
                <li>
                    <a href="#">
                        <span class="w-5">
                            {{ svg('heroicon-o-cog-6-tooth') }}
                        </span>
                        <span>Control panel</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
