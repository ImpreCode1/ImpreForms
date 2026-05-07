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
        $lineas = Linea::orderBy('id', 'desc')->paginate(10);
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
            'codigo' => $this->codigo,
            'activo' => true,
        ]);

        session()->flash('success', 'Línea creada correctamente.');
        $this->closeModal();
    }

    public function edit(Linea $linea)
    {
        $this->lineaId = $linea->id;
        $this->nombre = $linea->linea;
        $this->codigo = $linea->codigo;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $linea = Linea::find($this->lineaId);
        $linea->update([
            'linea' => $this->nombre,
            'codigo' => $this->codigo,
        ]);

        session()->flash('success', 'Línea actualizada correctamente.');
        $this->closeModal();
    }

    public function deactivate(Linea $linea)
    {
        $linea->update(['activo' => false]);
        session()->flash('success', 'Línea desactivada.');
    }

    public function activate(Linea $linea)
    {
        $linea->update(['activo' => true]);
        session()->flash('success', 'Línea reactivada.');
    }
}