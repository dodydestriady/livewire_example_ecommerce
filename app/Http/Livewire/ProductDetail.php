<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1;

    public function mount(Product $product) {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-detail')->extends('layouts.app');
    }

    public function incrementQty()
    {
        $this->quantity--;
    }

    public function decrementQty()
    {
        $this->quantity++;
    }

    public function addCart()
    {
        $cart = auth()->user()->carts()->where('product_id', $this->product->id)->first();
        if ($cart) {
            $cart = $cart->increment('quantity', $this->quantity);
        } else {
            $cart = auth()->user()->carts()->create([
                'product_id' => $this->product->id,
                'quantity' => $this->quantity
            ]);
        }

        session()->flash('message', __('Product added to cart'));
    }

    public function checkoutNow()
    {
        $this->addCart();
        return redirect()->to(route('checkout'));
    }
}
