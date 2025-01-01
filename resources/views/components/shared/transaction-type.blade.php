@props(['type'])

@if($type == 'debit')
    <span class="bg-red-600 inline-block w-12 text-center py-0.5 rounded-sm text-white">Debit</span>
@else
    <span class="bg-green-600 inline-block w-12 text-center py-0.5 rounded-sm text-white">Credit</span>
@endif
