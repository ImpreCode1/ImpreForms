<?php

namespace App\Livewire;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;

class FormulariosRecibidos extends Component
{
    use WithPagination;

    public $negocio, $nombres, $correo, $numero, $crms;
    public $fecha, $oc, $precio, $soluciones, $linea, $codlinea;
    public $nomgerente, $telgerente, $corgerente, $director, $tel2gerente, $cor2gerente;
    public $entregacliente, $lugarentrega, $espais, $tiempoentrega, $terminoentrega, $tipoicoterm;
    public $prestar, $suministrar, $inicio, $finalizacion;
    public $clientcode, $clientname, $mail, $details;
    public $aplicagarantia, $terminogarantia, $aplicapoliza, $porcentaje;
    public $formapago, $moneda, $incluye_iva, $fecha_pago, $otros;
    public $formulario;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    // public $results = [];
    public $totalFormularios = 0;

    // public $showModal = false;

    public $selectedFormulario;
    protected $paginationTheme = 'tailwind';

    public $open = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSorting($field)
    {
        if (strpos($field, '_asc') !== false) {
            $this->sortBy = str_replace('_asc', '', $field);
            $this->sortDirection = 'asc';
        } elseif (strpos($field, '_desc') !== false) {
            $this->sortBy = str_replace('_desc', '', $field);
            $this->sortDirection = 'desc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function mount()
    {
        $this->totalFormularios = Marca::count();
    }

    public function loadFormulario($id)
    {
        $this->selectedFormulario = Marca::with([
            'infonegocio',
            'informacion.producto',
            'pago',
            'financiera',
            'infoEntrega',
        ])->findOrFail($id);
    }

    public function closeModal()
    {
        $this->selectedFormulario = null;
    }

    public function render()
    {
        $query = Marca::with('infonegocio', 'informacion')->when($this->search, function ($query) {
            $query->whereHas('infonegocio', function ($q) {
                $q->where('codigo_cliente', 'like', '%' . $this->search . '%')
                    ->orWhere('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('n_oportunidad_crm', 'like', '%' . $this->search . '%');
            });
        });

        $formularios = $query->orderBy($this->sortBy, $this->sortDirection)->paginate(10);

        return view('livewire.formularios-recibidos', [
            'formularios' => $formularios,
            'totalFormularios' => $this->totalFormularios,
        ]);
    }
}
