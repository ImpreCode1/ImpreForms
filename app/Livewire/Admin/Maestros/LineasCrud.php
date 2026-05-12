<?php

namespace App\Livewire\Admin\Maestros;

use App\Models\Linea;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class LineasCrud extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $lineaId = null;

    #[Rule('required|string|min:2|max:100')]
    public $nombre = '';

    #[Rule('nullable|string|max:20')]
    public $codigo = '';

    public function mount()
    {
        abort_unless(Auth::check() && Auth::user()->isAdmin(), 403);
    }

    public function render()
    {
        $lineas = Linea::orderBy('id', 'desc')->whereNotNull('linea')->get();
        return view('livewire.admin.maestros.lineas-crud', compact('lineas'));
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['nombre', 'codigo', 'lineaId', 'editMode']);
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

        Linea::create([
            'linea' => $this->nombre,
            'codigo_linea' => $this->codigo,
            'activo' => true,
        ]);

        session()->flash('success', 'Línea creada correctamente.');
        $this->closeModal();
    }

    public function edit(Linea $linea)
    {
        $this->lineaId = $linea->id;
        $this->nombre = $linea->linea;
        $this->codigo = $linea->codigo_linea;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $linea = Linea::find($this->lineaId);
        $linea->update([
            'linea' => $this->nombre,
            'codigo_linea' => $this->codigo,
        ]);

        session()->flash('success', 'Línea actualizada correctamente.');
        $this->closeModal();
    }

    public function delete(Linea $linea)
    {
        $linea->delete();
        session()->flash('success', 'Línea eliminada correctamente.');
    }

    public function toggleActivo(Linea $linea)
    {
        $linea->update(['activo' => !$linea->activo]);
        session()->flash('success', $linea->activo ? 'Línea activada.' : 'Línea desactivada.');
    }
}

