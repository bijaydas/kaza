<form wire:submit="save" class="w-1/2">
    <x-layouts.section title="Create expense" description="Add your expenses">
        <div class="flex flex-col gap-y-4">
            <div class="flex space-x-2">
                <div class="form-control flex-1">
                    <div class="label">
                        <span class="label-text">Expense Category</span>
                    </div>
                    <select wire:model="form.categoryId" class="select select-bordered w-full">
                        <option value="0">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <x-form.input type="number" name="form.amount" wire:model="form.amount" label="Amount" containerClass="flex-1"/>
            </div>

            <div class="flex space-x-2">
                <x-form.input type="date" wire:model="form.date" label="Date of expense" containerClass="flex-1" />

                <div class="form-control flex-1">
                    <div class="label">
                        <span class="label-text">Payment method</span>
                    </div>
                    <select wire:model="form.paymentMethod" class="select select-bordered w-full">
                        @foreach($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod }}">{{ $paymentMethod }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex space-x-2">
                <div class="form-control flex-1">
                    <div class="label">
                        <span class="label-text">Transaction type</span>
                    </div>
                    <div class="flex">
                        <x-form.radio wire:model="form.type" label="Debit" name="type" value="debit" />
                        <x-form.radio wire:model="form.type" label="Credit" name="type" value="credit" />
                    </div>
                </div>


                <x-form.input type="text" name="form.description" wire:model="form.description" label="Description" containerClass="flex-1"/>
            </div>

            @include('shared.form-result')
        </div>
    </x-layouts.section>

    <div class="mt-2 flex justify-end space-x-2">
        <x-form.button type="reset" neutral wire:click="resetForm">Reset</x-form.button>
        <x-form.button type="submit" submitIcon primary>Create</x-form.button>
    </div>
</form>
