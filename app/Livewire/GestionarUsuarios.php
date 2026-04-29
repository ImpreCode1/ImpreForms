<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarUsuarios extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $userIdBeingDeleted = null;
    public ?string $userNameBeingDeleted = null;
    public string $newRol = '';
    public ?int $userIdBeingEdited = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getUsersProperty()
    {
        return User::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                 ->orWhere('email', 'like', '%' . $this->search . '%');
        })->orderBy('name')->paginate(10);
    }

    public function confirmDelete($userId)
    {
        $this->userIdBeingDeleted = $userId;
        $user = User::find($userId);
        $this->userNameBeingDeleted = $user?->name;
    }

    public function deleteUser()
    {
        if ($this->userIdBeingDeleted) {
            $user = User::find($this->userIdBeingDeleted);
            if ($user) {
                $user->delete();
                session()->flash('success', 'Usuario eliminado correctamente.');
            }
        }
        $this->userIdBeingDeleted = null;
        $this->userNameBeingDeleted = null;
    }

    public function confirmEditRol($userId)
    {
        $this->userIdBeingEdited = $userId;
        $user = User::find($userId);
        $this->newRol = $user?->rol ?? 'User';
    }

    public function updateRol()
    {
        if ($this->userIdBeingEdited && $this->newRol) {
            $user = User::find($this->userIdBeingEdited);
            if ($user) {
                $user->update(['rol' => $this->newRol]);
                session()->flash('success', 'Rol actualizado correctamente.');
            }
        }
        $this->userIdBeingEdited = null;
        $this->newRol = '';
    }

    public function render()
    {
        $users = User::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                 ->orWhere('email', 'like', '%' . $this->search . '%');
        })->orderBy('name')->paginate(10);

        return view('livewire.gestionar-usuarios.gestionar-usuarios', [
            'users' => $users
        ]);
    }
}