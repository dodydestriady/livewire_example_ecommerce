<?php

namespace App\Http\Livewire\Account\Store;

use Livewire\Component;

class TransactionIndex extends Component
{
    public function render()
    {
        return view('livewire.account.store.transaction-index')->layout('layouts.account');
    }
}
