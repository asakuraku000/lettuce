<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\AccountsManagement;
use App\Livewire\Dashboard;
use App\Livewire\LandingPage;
use App\Livewire\Login;
use App\Livewire\Recommendations;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->middleware(AdminMiddleware::class)->name('dashboard');
Route:: get('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('accounts', AccountsManagement::class)->name('accounts');
    Route::get('recommendations', Recommendations::class)->name('recommendations');
});