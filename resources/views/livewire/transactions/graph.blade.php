<div class="w-11/12 mx-auto overflow-x-auto">

    {{--  Breadcrumb section  --}}
    <div class="flex items-center my-4">
        <div class="flex-1">
            <x-shared.breadcrumbs until="transactions" />
        </div>
        <div class="flex-1 text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('transactions.create') }}">
                <span>Create</span>
                <x-heroicon-o-plus-small class="w-5" />
            </a>
        </div>
    </div>

    {{--  Filter section  --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold">Transactions Graph</h2>
            <p class="text-sm text-gray-500">Transactions Details</p>
        </div>
    </div>

    {{--  Table section  --}}
    <div class="px-4 py-4 w-full">
        <div class="grid grid-cols-2">
            <div>
                <canvas height="80" id="sinceBeginning"></canvas>
            </div>
            <div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function sinceBeginning() {
                new Chart(document.getElementById('sinceBeginning'), {
                  type: 'line',
                  data: {
                    datasets: [
                      {
                        label: '# Since beginning',
                        data: @json($sinceBeginningData->map(fn ($data) => $data->totalExpense)),
                      },
                    ],
                    labels: @json($sinceBeginningData->map(fn ($data) => $data->year))
                  },
                });
            }

            sinceBeginning();
        </script>
    @endpush
</div>
