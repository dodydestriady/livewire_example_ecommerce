<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowProfile extends Component
{
    public $data;

    protected $rules = [
        'data.name' => 'required|string|min:6',
        'data.phone' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->data = Auth::user();
    }

    public function render()
    {
        return view('livewire.account.show-profile')
                ->layout('layouts.account');
    }
}
