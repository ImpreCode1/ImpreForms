<?php

namespace App\Livewire;

use App\Models\Marca;
use Livewire\Attributes\On;
use Livewire\Component;

class Historial extends Component
{
    public $formularios;
    public $editingFormulario;
    public $showEditModal = false;
    public $mostrarMas = false;

    #[On('formularioUpdated')]
    public function mount()
    {
        $this->formularios = Marca::with('infonegocio', 'informacion', 'documento', 'financiera')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc') // 🔹 Ordenar por más recientes
            ->get();
    }

    public function edit($id)
    {
        $this->editingFormulario = Marca::with(['infonegocio', 'informacion.producto', 'pago', 'financiera'])->find($id);
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }

    public function toggleMostrarMas()
    {

        $this->mostrarMas = !$this->mostrarMas;
    }



    public function render()
    {

        return view('livewire.historial', [
            'formularios' => $this->formularios,
            'mostrarMas' => $this->mostrarMas,

        ]);
    }
}
