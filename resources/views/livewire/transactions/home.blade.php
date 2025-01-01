<div class="w-11/12 mx-auto overflow-x-auto">
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

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold">Transactions</h2>
            <p class="text-sm text-gray-500">View all transactions</p>
        </div>
        <form wire:submit="handleSearch" class="my-3 flex justify-end items-center space-x-3">
            <input wire:model="search" class="input input-sm input-bordered" type="text" placeholder="Search..." />

            <select wire:model="type" class="select select-sm select-bordered">
                <option value="0">Debit and Credit</option>
                <option value="debit">Debit</option>
                <option value="credit">Credit</option>
            </select>

            <select wire:model="category" class="select select-sm select-bordered">
                <option value="0">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <select wire:model="timeframe" class="select select-sm select-bordered">
                <option value="0">Timeframe</option>
                <option value="today">Today</option>
                <option value="yesterday">Yesterday</option>
                <option value="this_week">This Week</option>
                <option value="last_week">Last Week</option>
                <option value="this_month">This Month</option>
                <option value="last_month">Last Month</option>
                <option value="this_year">This Year</option>
                <option value="last_year">Last Year</option>
            </select>

            <button class="btn btn-neutral btn-sm border" type="submit">Search</button>
        </form>
    </div>

    <div class="bg-white px-4 py-4 border w-full">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($transactions->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">No transactions found</td>
                    </tr>
                @endif

                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->expenseCategory->name }}</td>
                        <td>
                            <x-shared.transaction-type :type="$transaction->type" />
                        </td>
                        <td>
                            <x-shared.amount :amount="$transaction->amount" :type="$transaction->type" />
                        </td>
                        <td>
                            <button class="btn btn-xs btn-ghost text-neutral" type="button">View details</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $transactions->links() }}
    </div>
</div>
