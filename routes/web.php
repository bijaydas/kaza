<?php

use App\Livewire\Auth\Login;
use App\Livewire\ControlPanel\HomePage as ControlPanelHomePage;
use App\Livewire\ControlPanel\User\Create as UserCreate;
use App\Livewire\ControlPanel\User\Edit as UserEdit;
use App\Livewire\ControlPanel\User\Index as UserIndex;
use App\Livewire\Home\Page as HomePage;
use App\Livewire\Transactions\Create as TransactionsCreate;
use App\Livewire\Transactions\Edit as TransactionsEdit;
use App\Livewire\Transactions\Home as TransactionsHome;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class)->name('home');

    Route::prefix('control-panel')->group(function () {
        Route::get('/', ControlPanelHomePage::class)->name('control-panel');
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
    });
});
