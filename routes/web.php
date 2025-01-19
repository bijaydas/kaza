<?php

use App\Livewire\Auth\Login;
use App\Livewire\ControlPanel\Home as HomeControlPanel;
use App\Livewire\ControlPanel\User\Create as UserCreate;
use App\Livewire\ControlPanel\User\Edit as UserEdit;
use App\Livewire\ControlPanel\User\Index as UserIndex;
use App\Livewire\Home\Home;
use App\Livewire\Transactions\Create as TransactionsCreate;
use App\Livewire\Transactions\Edit as TransactionsEdit;
use App\Livewire\Transactions\Graph as TransactionsGraph;
use App\Livewire\Transactions\Home as TransactionsHome;
use App\Services\TransactionGraph;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return (new TransactionGraph(auth()->user()))->yearExpenses(2018);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::prefix('control-panel')->group(function () {
        Route::get('/', HomeControlPanel::class)->name('control-panel');
        Route::prefix('users')->group(function () {
            Route::get('/', UserIndex::class)->name('users.index');
            Route::get('create', UserCreate::class)->name('users.create');
            Route::get('{id}/edit', UserEdit::class)->name('users.edit');
        });
    });

    Route::prefix('transactions')->group(function () {
        Route::get('/', TransactionsHome::class)->name('transactions.index');
        Route::get('create', TransactionsCreate::class)->name('transactions.create');
        Route::get('{id}/edit', TransactionsEdit::class)->name('transactions.edit');
        Route::get('graph', TransactionsGraph::class)->name('transactions.graph');
    });
});
