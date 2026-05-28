<?php

namespace App\Livewire\Seguimiento;

use App\Exports\SeguimientosExport;
use App\Models\Seguimiento;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class SeguimientoIndex extends Component
{
    use WithPagination;

    public $filtroEstado = '';
    public $filtroBusqueda = '';
    public $showModal = false;
    public $seguimientoId = null;
    public $showDetailModal = false;
    public $detailSeguimiento = null;

    protected $paginationTheme = 'tailwind';

    #[Computed]
    public function isAdmin(): bool
    {
        return auth()->user() && auth()->user()->isAdmin();
    }

    #[Computed]
    public function seguimientos()
    {
        return Seguimiento::with('marca.infonegocio')
            ->when($this->filtroEstado, fn($q) => $q->where('estado', $this->filtroEstado))
            ->when($this->filtroBusqueda, fn($q) => $q->where(function($q) {
                $q->where('cliente', 'like', '%' . $this->filtroBusqueda . '%')
                  ->orWhere('linea_primaria', 'like', '%' . $this->filtroBusqueda . '%')
                  ->orWhereHas('marca.infonegocio', fn($q) =>
                      $q->where('n_oportunidad_crm', 'like', '%' . $this->filtroBusqueda . '%')
                  );
            }))
            ->orderBy('fecha_apertura', 'desc')
            ->paginate(10);
    }

    public function openModal($id = null)
    {
        if ($id === null) {
            return;
        }
        $this->seguimientoId = $id;
        $this->showModal = true;
        $this->dispatch('refresh-form', $id);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->seguimientoId = null;
    }

    public function openDetail($id)
    {
        $this->detailSeguimiento = Seguimiento::with('marca.infonegocio', 'marca.informacion', 'marca.pago')->find($id);
        $this->showDetailModal = true;
    }

    public function closeDetail()
    {
        $this->showDetailModal = false;
        $this->detailSeguimiento = null;
    }

    public function exportar(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filename = 'BASE_PROYECTOS_' . now()->format('Ymd_Hi') . '.xlsx';
        return Excel::download(
            new SeguimientosExport($this->filtroEstado, $this->filtroBusqueda),
            $filename
        );
    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento-index', [
            'seguimientos' => $this->seguimientos,
            'isAdmin' => $this->isAdmin,
        ]);
    }
}
