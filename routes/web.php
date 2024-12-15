<?php

use App\Livewire\Auth\Login;
use App\Livewire\ControlPanel\User\Create as UserCreate;
use App\Livewire\Home\Page as HomePage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class)->name('home');

    Route::prefix('control-panel')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('create', UserCreate::class)->name('users.create');
        });
    });
});
