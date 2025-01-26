<div class="sidenav">
    <div class="logo-container">
        <a href="/" title="Kaza">
            <img src="{{ asset('/logo.png') }}" alt="Kaza logo" class="w-24 mx-auto opacity-60 hover:opacity-80" />
        </a>
    </div>

    <nav class="nav-container roboto-regular">
        <div class="section">
            <h3 class="title">Transactions</h3>

            <ul>
                <li>
                    <a href="{{ route('transactions.create') }}">
                        <x-heroicon-o-plus-small class="w-4" />
                        <span>Create</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transactions.index') }}">
                        <x-heroicon-o-home class="w-4" />
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transactions.graph') }}">
                        <x-heroicon-o-chart-pie class="w-4" />
                        <span>Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
