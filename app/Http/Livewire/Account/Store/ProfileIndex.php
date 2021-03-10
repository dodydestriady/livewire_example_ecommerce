<?php

namespace App\Http\Livewire\Account\Store;

use Livewire\Component;

class ProfileIndex extends Component
{
    public function render()
    {
        return view('livewire.account.store.profile-index')->layout('layouts.account');
    }
}
