<?php

namespace App\Http\Livewire\Account\Store;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductForm extends Component
{
    public $name, $description, $price, $stock, $category, $categories, $action;
    
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required|integer|min:0',
        'price' => 'required|integer|min:0',
        'category' => 'required|exists:categories,id'
    ];

    public function mount($action)
    {
        $this->action = $action;
        $this->categories = Category::select('id', 'name')->get();
    }

    public function render()
    {
        return view('livewire.account.store.product-form');
    }

    public function create()
    {
        $this->validate();

        $product = auth()->user()->store->products()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->category
        ]);

        $this->emit('productCreated', $product);
    }

    public function edit($product)
    {
        $this->isUpdate = true;
    }

    public function update()
    {

    }

}
