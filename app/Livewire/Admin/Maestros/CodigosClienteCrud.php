<?php

namespace App\Livewire\Admin\Maestros;

use App\Models\Codigo;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CodigosClienteCrud extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $codigoId = null;

    #[Rule('required|integer|min:1')]
    public $codigo = '';

    #[Rule('nullable|string|max:100')]
    public $descripcion = '';

    public function mount()
    {
        abort_unless(Auth::check() && Auth::user()->isAdmin(), 403);
    }

    public function render()
    {
        $codigos = Codigo::orderBy('id', 'desc')->paginate(20);
        return view('livewire.admin.maestros.codigos-cliente-crud', compact('codigos'));
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['codigo', 'descripcion', 'codigoId', 'editMode']);
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

        Codigo::create([
            'codigo_cliente' => $this->codigo,
            'nombre_cliente' => $this->descripcion,
            'activo' => true,
        ]);

        session()->flash('success', 'Código de cliente creado correctamente.');
        $this->closeModal();
    }

    public function edit(Codigo $codigo)
    {
        $this->codigoId = $codigo->id;
        $this->codigo = $codigo->codigo_cliente;
        $this->descripcion = $codigo->nombre_cliente;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $codigo = Codigo::find($this->codigoId);
        $codigo->update([
            'codigo_cliente' => $this->codigo,
            'nombre_cliente' => $this->descripcion,
        ]);

        session()->flash('success', 'Código de cliente actualizado correctamente.');
        $this->closeModal();
    }

    public function delete(Codigo $codigo)
    {
        $codigo->delete();
        session()->flash('success', 'Código de cliente eliminado correctamente.');
    }

    public function toggleActivo(Codigo $codigo)
    {
        $nuevoEstado = !$codigo->activo;
        $codigo->update(['activo' => $nuevoEstado]);
        session()->flash('success', $nuevoEstado ? 'Código activado.' : 'Código desactivado.');
    }
}

