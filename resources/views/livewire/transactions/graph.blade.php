<x-layouts.section>
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold">Transactions Graph</h2>
            <p class="text-sm text-gray-500">Transactions Details</p>
        </div>
    </div>

    <div class="px-4 py-4 w-full">
        <div class="grid grid-cols-2">
            <div>
                <canvas height="80" id="sinceBeginning"></canvas>
            </div>

            <livewire:shared.expense-for-year-graph />
        </div>
    </div>

    @push('scripts')
        <script>
            function sinceBeginning() {
                new Chart(document.getElementById('sinceBeginning'), {
                  type: 'line',
                  options: {
                    animations: true,
                    plugins: {
                      legend: {
                        display: false,
                      },
                      tooltip: {
                        display: true,
                      },
                      title: {
                        display: true,
                        text: '# Expenses by year',
                      }
                    },
                  },
                  data: {
                    datasets: [
                      {
                        label: '# Expenses by year',
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
</x-layouts.section>
