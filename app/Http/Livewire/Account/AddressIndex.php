<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class AddressIndex extends Component
{
    public $addresses;

    protected $listeners = [
        'addressCreated' => 'handleAddressCreated'
    ];
    
    public function render()
    {
        $this->addresses = auth()->user()->addresses;
        return view('livewire.account.address-index')->layout('layouts.account');
    }

    public function handleAddressCreated($address)
    {
        session()->flash('message', __('Address was created', $address));
    }
}
