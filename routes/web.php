<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Seller\WelcomeController;
use App\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', App\Http\Livewire\Home::class);
Route::get('/home', App\Http\Livewire\Home::class);

Route::group(['prefix' => 'seller', 'namespace' => 'seller'], function () {
    Route::get('/', [WelcomeController::class, 'index']);
});

Route::get('/product/{product:slug}', App\Http\Livewire\ProductDetail::class)->name('product');

Route::group([
    'middleware' => 'auth',
], function() {

    Route::get('/cart', App\Http\Livewire\Cart::class)->name('cart');
    Route::get('/checkout', App\Http\Livewire\Checkout::class)->name('checkout');

    Route::group([
        'prefix' => 'account',
        'as' => 'account.'
    ], function() {
        Route::get('/profile', App\Http\Livewire\Account\ShowProfile::class)->name('profile');
        Route::get('/address', App\Http\Livewire\Account\AddressIndex::class)->name('address');
        Route::get('/transaction', App\Http\Livewire\Account\TransactionIndex::class)->name('transaction');
        Route::get('/change_password', App\Http\Livewire\Account\ChangePasswordIndex::class)->name('change_password');

        Route::group([
            'prefix' => 'store',
            'as' => 'store.'
        ], function() {
            Route::get('/profile', App\Http\Livewire\Account\Store\ProfileIndex::class)->name('profile');
            Route::get('/transaction', App\Http\Livewire\Account\Store\TransactionIndex::class)->name('transaction');
            Route::get('/product', App\Http\Livewire\Account\Store\ProductIndex::class)->name('product');
        });
    });
});