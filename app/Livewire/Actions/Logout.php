<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        $userEmail = Auth::user()?->email ?? 'Guest';
        
        Log::channel('activity')->info("User logged out", [
            'email' => $userEmail,
        ]);

        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        
        Session::flash('logout_success', 'Has cerrado sesión correctamente. ¡Hasta pronto!');
    }
}
