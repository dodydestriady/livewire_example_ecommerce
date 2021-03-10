<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StoreCreate extends Component
{
    public $name;
    public $caption;
    public $address;

    public function render()
    {
        return view('livewire.account.store-create');
    }

    public function create()
    {
        $store = Auth::user()->store()->create([
            'name' => $this->name,
            'caption' => $this->caption,
            'address' => $this->address
        ]);

        $this->emit('storeCreated', $store);
    }
}
