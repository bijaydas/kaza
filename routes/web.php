<?php

use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Admin\User\Create as AdminUserCreate;
use App\Livewire\Admin\User\Home as AdminUserHome;
// use App\Livewire\ControlPanel\Home as HomeControlPanel;
// use App\Livewire\ControlPanel\User\Create as UserCreate;
// use App\Livewire\ControlPanel\User\Edit as UserEdit;
// use App\Livewire\ControlPanel\User\Index as UserIndex;
use App\Livewire\Auth\Login;
use App\Livewire\Home\Home;
use App\Livewire\Settings\Email\Edit as EmailEdit;
use App\Livewire\Settings\Email\Home as EmailHome;
use App\Livewire\Settings\Password\Edit as PasswordEdit;
use App\Livewire\Settings\Profile\Edit as ProfileEdit;
use App\Livewire\Settings\Profile\Home as ProfileHome;
use App\Livewire\Transactions\Analytics\Dashboard as TransactionsAnalyticsHome;
use App\Livewire\Transactions\Create as TransactionsCreate;
use App\Livewire\Transactions\Edit as TransactionsEdit;
use App\Livewire\Transactions\Home as TransactionsHome;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    //    Route::prefix('control-panel')->group(function () {
    //        Route::get('/', HomeControlPanel::class)->name('control-panel');
    //
    //        Route::prefix('users')->group(function () {
    //            Route::get('/', UserIndex::class)->name('users.index');
    //            Route::get('create', UserCreate::class)->name('users.create');
    //            Route::get('{id}/edit', UserEdit::class)->name('users.edit');
    //        });
    //    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', AdminHome::class)->name('home');
        Route::get('users', AdminUserHome::class)->name('users');
        Route::get('users/create', AdminUserCreate::class)->name('users.create');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('profile', ProfileHome::class)->name('profile');
        Route::get('profile/edit', ProfileEdit::class)->name('profile.edit');

        Route::get('email', EmailHome::class)->name('email');
        Route::get('email/edit', EmailEdit::class)->name('email.edit');

        Route::get('password/edit', PasswordEdit::class)->name('password.edit');
    });

    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', TransactionsHome::class)->name('index');
        Route::get('create', TransactionsCreate::class)->name('create');
        Route::get('{id}/edit', TransactionsEdit::class)->name('edit');

        Route::get('analytics', TransactionsAnalyticsHome::class)->name('analytics.home');
    });
});
