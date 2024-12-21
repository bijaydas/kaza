<?php

use App\Livewire\Auth\Login;
use App\Livewire\ControlPanel\User\Create as UserCreate;
use App\Livewire\ControlPanel\User\Index as UserIndex;
use App\Livewire\ControlPanel\User\Edit as UserEdit;
use App\Livewire\Home\Page as HomePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\ControlPanel\HomePage as ControlPanelHomePage;

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
});
