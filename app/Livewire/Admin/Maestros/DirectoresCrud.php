<?php

namespace App\Livewire\Admin\Maestros;

use App\Models\Director;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DirectoresCrud extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $directorId = null;

    #[Rule('required|string|min:2|max:100')]
    public $nombre = '';

    #[Rule('nullable|email|max:100')]
    public $email = '';

    public function mount()
    {
        abort_unless(Auth::check() && Auth::user()->isAdmin(), 403);
    }

    public function render()
    {
        $directores = Director::orderBy('id', 'desc')->whereNotNull('nombre_director')->get();
        return view('livewire.admin.maestros.directores-crud', compact('directores'));
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['nombre', 'email', 'directorId', 'editMode']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Director::create([
            'nombre_director' => $this->nombre,
            'mail' => $this->email,
            'activo' => true,
        ]);

        session()->flash('success', 'Director creado correctamente.');
        $this->closeModal();
    }

    public function edit(Director $director)
    {
        $this->directorId = $director->id;
        $this->nombre = $director->nombre_director;
        $this->email = $director->mail;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $director = Director::find($this->directorId);
        $director->update([
            'nombre_director' => $this->nombre,
            'mail' => $this->email,
        ]);

        session()->flash('success', 'Director actualizado correctamente.');
        $this->closeModal();
    }

    public function delete(Director $director)
    {
        $director->delete();
        session()->flash('success', 'Director eliminado correctamente.');
    }

    public function toggleActivo(Director $director)
    {
        $director->update(['activo' => !$director->activo]);
        session()->flash('success', $director->activo ? 'Director activado.' : 'Director desactivado.');
    }
}

