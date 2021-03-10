<?php

namespace App\Http\Livewire\Account\Store;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public $formAction;
    public $products;
    protected $listeners = [
        'productCreated' => 'handleProductCreated',
    ];

    public function render()
    {
        $store = auth()->user()->store->products()->with('category')->get();
        // dd($store);
        // $this->products = Product::where('store_id', $store->id)->with('category')->get();
        $this->products = $store;
        return view('livewire.account.store.product-index')->layout('layouts.account');
    }

    public function add()
    {
        $this->formAction = 'add';
    }

    public function edit($id)
    {
        $this->formAction = 'edit';
    }

    public function handleProductCreated($product)
    {
        session()->flash('message', __('Product created'));
    }
}
