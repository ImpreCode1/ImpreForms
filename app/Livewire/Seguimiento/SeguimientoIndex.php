<?php

namespace App\Livewire\Seguimiento;

use App\Models\Seguimiento;
use Livewire\Component;
use Livewire\WithPagination;

class SeguimientoIndex extends Component
{
    use WithPagination;

    public $filtroEstado = '';
    public $filtroCliente = '';
    public $showModal = false;
    public $seguimientoId = null;

    protected $paginationTheme = 'tailwind';

    public function getIsAdminProperty()
    {
        return auth()->user() && auth()->user()->isAdmin();
    }

    public function getSeguimientosProperty()
    {
        return Seguimiento::query()
            ->when($this->filtroEstado, fn($q) => $q->where('estado', $this->filtroEstado))
            ->when($this->filtroCliente, fn($q) => $q->where('cliente', 'like', '%' . $this->filtroCliente . '%'))
            ->orderBy('fecha_apertura', 'desc')
            ->paginate(10);
    }

    public function openModal($id = null)
    {
        $this->seguimientoId = $id;
        $this->showModal = true;
        $this->dispatch('refresh-form', $id);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->seguimientoId = null;
    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento-index', [
            'seguimientos' => $this->seguimientos,
            'isAdmin' => $this->isAdmin,
        ]);
    }
}
