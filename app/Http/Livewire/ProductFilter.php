<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProductFilter extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::select('id', 'name')->get();

        return view('livewire.product-filter');
    }
}
