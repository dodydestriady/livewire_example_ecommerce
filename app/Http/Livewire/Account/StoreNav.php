<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StoreNav extends Component
{
    public $store;

    protected $listeners = [
        'storeCreated' => 'handleStoreCreated'
    ];

    public function render()
    {
        $this->store = Auth::user()->store;
        return view('livewire.account.store-nav');
    }

    public function handleStoreCreated($store)
    {
        $this->dispatchBrowserEvent('storeCreated', $store);
        session()->flash('message', __('message.Store Created'));
    }

}
