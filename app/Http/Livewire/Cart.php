<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $carts, $updateMode, $productUpdateId;

    public function getTotalPriceProperty() {
        return $this->carts->sum( function($cart) {
            return $cart->quantity * $cart->product->price;
        });
    }

    public function getTotalQuantityProperty() {
        return $this->carts->sum('quantity');
    }

    public function render()
    {
        $this->carts = auth()->user()->carts()->with(['product', 'product.store'])->get();
        return view('livewire.cart')->extends('layouts.app')->section('content');
    }
}
