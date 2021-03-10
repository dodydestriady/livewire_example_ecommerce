<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Livewire\Component;

class Checkout extends Component
{
    public $carts, $updateMode, $productUpdateId, $addresses, $destination, $stores;

    protected $rules = [
        'destination' => 'required'
    ];

    public function getTotalPriceProperty() {
        return $this->carts->sum( function($cart) {
            return $cart->quantity * $cart->product->price;
        });
    }

    public function getTotalQuantityProperty() {
        return $this->carts->sum('quantity');
    }

    public function getTotalShippingProperty() {
        return count($this->stores) * Order::SHIPPING_FEE;
    }

    public function getGrandTotalProperty() {
        return $this->total_price + $this->total_shipping;
    }

    public function mount()
    {
    }

    public function render()
    {
        $this->addresses = auth()->user()->addresses()->select('name', 'address')->get();

        $this->carts = auth()->user()->carts()->with(['product', 'product.store' ])->get();
        $this->stores = [];
        foreach($this->carts as $cart) {
            $this->stores[$cart->product->store->id]['id'] = $cart->product->store->id;
            $this->stores[$cart->product->store->id]['name'] = $cart->product->store->name;
            $this->stores[$cart->product->store->id]['cart'][] = $cart;
        } 
        
        return view('livewire.checkout')->extends('layouts.app')->section('content');
    }

    public function create()
    {
        $order = OrderRepository::create([
            'stores' => $this->stores,
            'total_quantity' => $this->total_quantity,
            'total_shipping' => $this->total_shipping,
            'total_price' => $this->total_price,
            'grand_total' => $this->grand_total,
            'destination' => $this->destination
        ]);
    }
}
