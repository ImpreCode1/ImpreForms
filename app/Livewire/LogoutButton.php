<?php

namespace App\Livewire;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutButton extends Component
{
    public function logout()
    {
        Auth::logout();
    
        session()->invalidate();
        session()->regenerateToken();
    
        return $this->redirect(route('login'), navigate: true);
    }
    public function render()
    {
        return view('livewire.logout-button');
    }
}
