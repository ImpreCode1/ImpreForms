<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
   
    public function logout(Request $request)
    {
        $userEmail = Auth::user()?->email ?? 'Guest';
        
        Log::channel('activity')->info("User logged out", [
            'email' => $userEmail,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Session::flash('logout_success', 'Has cerrado sesión correctamente. ¡Hasta pronto!');
        
        return redirect('/');
    }
}
