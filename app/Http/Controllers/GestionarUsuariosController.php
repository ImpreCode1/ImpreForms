<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GestionarUsuariosController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        
        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                 ->orWhere('email', 'like', '%' . $search . '%');
        })->orderBy('name')->paginate(10);

        return view('gestionar-usuarios.index', [
            'users' => $users,
            'search' => $search
        ]);
    }

    public function updateRol(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['rol' => $request->input('rol')]);
        
        return redirect()->back()->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}