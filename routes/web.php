<?php

use App\Livewire\Auth\Login;
use App\Livewire\Home\Page;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Page::class)->name('home');
});
