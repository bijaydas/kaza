<div>
    <div class="flex justify-between items-center">
        <div>
            <h4>Expense by year</h4>
        </div>

        <div>
            <select wire:change="$dispatch('expenses-by-year-frontend-updated')" wire:model="year" class="select select-primary select-sm">
                <option value="0">Select a year</option>
                <option value="2013">2013</option>
                <option value="2015">2015</option>
                <option value="2018">2018</option>
                <option value="2020">2020</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
    </div>

    <canvas height="80" id="yearExpenses"></canvas>
</div>
