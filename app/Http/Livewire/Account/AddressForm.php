<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class AddressForm extends Component
{
    public $name;
    public $address;

    public $rules = [
        'name' => 'required',
        'address' => 'required',
    ];

    public function render()
    {
        return view('livewire.account.address-form');
    }

    public function create()
    {
        $this->validate();

        $address = auth()->user()->addresses()->create([
            'name' => $this->name,
            'address' => $this->address
        ]);

        $this->emit('addressCreated', $address);
        $this->reset();
    }
}
