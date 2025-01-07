<div class="w-11/12 mx-auto overflow-x-auto pb-10">

    {{--  Breadcrumb section  --}}
    <div class="flex items-center my-4">
        <div class="flex-1">
            <x-shared.breadcrumbs until="transactions" />
        </div>

        <div class="flex-1 text-right">
            <a class="btn btn-sm btn-ghost" href="{{ route('transactions.graph') }}">
                <span>Usage</span>
                <x-heroicon-o-chart-bar-square class="w-5" />
            </a>

            <a class="btn btn-sm btn-primary" href="{{ route('transactions.create') }}">
                <span>Create</span>
                <x-heroicon-o-plus-small class="w-5" />
            </a>
        </div>
    </div>

    {{--  Filter section  --}}
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

    {{--  Table section  --}}
    <div class="bg-white px-4 py-4 border w-full">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Payment method</th>
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
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->expenseCategory->name }}</td>
                        <th class="flex items-center space-x-2">
                            @if(file_exists(public_path('images/icons/' . $transaction->payment_method . '.png')))
                                <img src="{{ asset('images/icons/'. $transaction->payment_method .'.png') }}" class="w-8" />
                            @endif
                            <span class="text-zinc-600">{{ $transaction->paymentMethodName() }}</span>
                        </th>
                        <td>
                            <x-shared.transaction-type :type="$transaction->type" />
                        </td>
                        <td>
                            <x-shared.amount :amount="$transaction->amount" :type="$transaction->type" />
                        </td>
                        <td>
                            <button wire:key="{{ $transaction->id }}" wire:click="viewTransaction({{ $transaction->id }})" type="button" class="btn btn-xs btn-ghost text-neutral">View details</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{--  Pagination section  --}}
    <div class="mt-4">
        {{ $transactions->links() }}
    </div>

    <div class="bg-black absolute -inset-0 h-screen bg-opacity-35 items-center justify-center {{ $showTransactionViewModal ? 'flex' : 'hidden' }}">
        <div class="w-6/12 max-w-5xl bg-white shadow-2xl rounded-md">

            <div class="border-b flex justify-between px-4 py-3">
                <h3 class="text-lg font-bold text-zinc-700">View transaction: # {{ $transactionViewDetails['id'] }}</h3>

                <button type="button" class="btn btn-ghost btn-sm btn-circle" x-on:click="$wire.set('showTransactionViewModal', false)">
                    <x-heroicon-s-x-mark class="w-5" />
                </button>
            </div>


            <div class="grid grid-cols-1 gap-y-4 px-4 py-3">

                <div class="grid grid-cols-2">
                    <x-shared.field-view label="Date" :value="$transactionViewDetails['date']" />

                    @if($transactionViewDetails['type'] === 'debit')
                        <x-shared.field-view label="Amount" valueClass="text-red-600" :value="$transactionViewDetails['amount']" />
                    @else
                        <x-shared.field-view label="Amount" valueClass="text-green-600" :value="$transactionViewDetails['amount']" />
                    @endif
                </div>

                <div class="grid grid-cols-2">
                    <x-shared.field-view label="Category" :value="$transactionViewDetails['category']" />

                    <div class="flex items-center space-x-2">
                        @if(file_exists(public_path('images/icons/' . $transactionViewDetails['paymentMethod'] . '.png')))
                            <img src="{{ asset('images/icons/'. $transactionViewDetails['paymentMethod'] .'.png') }}" class="w-8" />
                        @endif
                        <span class="text-zinc-600">{{ $transactionViewDetails['paymentMethodName'] }}</span>
                    </div>
                </div>

                @if($transactionViewDetails['description'] !== '')
                    <x-shared.field-view label="Description" :value="$transactionViewDetails['description']" />
                @endif

                <div class="text-right">
                    <a href="{{ route('transactions.edit', $transactionViewDetails['id']) }}" class="btn btn-sm">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
