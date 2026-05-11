<?php

namespace App\Livewire\Admin\Maestros;

use App\Models\Ejecutivo;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class EjecutivosCrud extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $ejecutivoId = null;

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
        $ejecutivos = Ejecutivo::orderBy('id', 'desc')->whereNotNull('nombre_colaborador')->get();
        return view('livewire.admin.maestros.ejecutivos-crud', compact('ejecutivos'));
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['nombre', 'email', 'ejecutivoId', 'editMode']);
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

        Ejecutivo::create([
            'nombre_colaborador' => $this->nombre,
            'mail' => $this->email,
            'activo' => true,
        ]);

        session()->flash('success', 'Ejecutivo creado correctamente.');
        $this->closeModal();
    }

    public function edit(Ejecutivo $ejecutivo)
    {
        $this->ejecutivoId = $ejecutivo->id;
        $this->nombre = $ejecutivo->nombre_colaborador;
        $this->email = $ejecutivo->mail;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $ejecutivo = Ejecutivo::find($this->ejecutivoId);
        $ejecutivo->update([
            'nombre_colaborador' => $this->nombre,
            'mail' => $this->email,
        ]);

        session()->flash('success', 'Ejecutivo actualizado correctamente.');
        $this->closeModal();
    }

    public function delete(Ejecutivo $ejecutivo)
    {
        $ejecutivo->delete();
        session()->flash('success', 'Ejecutivo eliminado correctamente.');
    }

    public function toggleActivo(Ejecutivo $ejecutivo)
    {
        $ejecutivo->update(['activo' => !$ejecutivo->activo]);
        session()->flash('success', $ejecutivo->activo ? 'Ejecutivo activado.' : 'Ejecutivo desactivado.');
    }
}

