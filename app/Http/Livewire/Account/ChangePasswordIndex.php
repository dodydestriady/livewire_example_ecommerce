<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class ChangePasswordIndex extends Component
{
    public function render()
    {
        return view('livewire.account.change-password-index')->layout('layouts.account');
    }
}
