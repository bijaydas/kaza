<div class="w-52">
    <div class="py-4">
        <img src="{{ asset('/logo.png') }}" alt="Kaza logo" class="w-24 mx-auto" />
    </div>

    <nav class="sidenav">
        <div class="section">
            <h3 class="title">Transactions</h3>

            <ul class="nav-container">
                <li>
                    <a href="{{ route('transactions.index') }}">
                        <x-heroicon-o-home class="w-4" />
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transactions.graph') }}">
                        <x-heroicon-o-chart-pie class="w-4" />
                        <span>Graph</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
