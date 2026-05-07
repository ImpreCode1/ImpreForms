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
        $codigos = Codigo::orderBy('id', 'desc')->paginate(10);
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
            'descripcion' => $this->descripcion,
            'codigo' => $this->codigo,
            'activo' => true,
        ]);

        session()->flash('success', 'Código de cliente creado correctamente.');
        $this->closeModal();
    }

    public function edit(Codigo $codigo)
    {
        $this->codigoId = $codigo->id;
        $this->codigo = $codigo->codigo_cliente;
        $this->descripcion = $codigo->descripcion;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $codigo = Codigo::find($this->codigoId);
        $codigo->update([
            'codigo_cliente' => $this->codigo,
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('success', 'Código de cliente actualizado correctamente.');
        $this->closeModal();
    }

    public function deactivate(Codigo $codigo)
    {
        $codigo->update(['activo' => false]);
        session()->flash('success', 'Código de cliente desactivado.');
    }

    public function activate(Codigo $codigo)
    {
        $codigo->update(['activo' => true]);
        session()->flash('success', 'Código de cliente reactivado.');
    }
}