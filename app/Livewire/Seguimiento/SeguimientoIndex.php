<?php

namespace App\Livewire\Seguimiento;

use App\Models\Seguimiento;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SeguimientoIndex extends Component
{
    use WithPagination;

    public string $filtroEstado = '';
    public string $filtroCliente = '';
    public bool $showModal = false;
    public ?int $seguimientoId = null;

    protected $paginationTheme = 'tailwind';

    public function updatingFiltroEstado()
    {
        $this->resetPage();
    }

    public function updatingFiltroCliente()
    {
        $this->resetPage();
    }

    public function getSeguimientosProperty()
    {
        return Seguimiento::when($this->filtroEstado, function ($query) {
            $query->where('estado', $this->filtroEstado);
        })
        ->when($this->filtroCliente, function ($query) {
            $query->where('cliente', 'like', '%' . $this->filtroCliente . '%');
        })
        ->orderBy('fecha_apertura', 'desc')
        ->paginate(15);
    }

    public function openModal(?int $id = null)
    {
        $this->seguimientoId = $id;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->seguimientoId = null;
    }

    public function isAdmin(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento-index', [
            'seguimientos' => $this->seguimientos,
            'isAdmin' => $this->isAdmin(),
        ]);
    }
}