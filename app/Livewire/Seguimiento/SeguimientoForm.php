<?php

namespace App\Livewire\Seguimiento;

use App\Models\Factura;
use App\Models\Seguimiento;
use Livewire\Component;

class SeguimientoForm extends Component
{
    public $seguimientoId = null;
    public $editMode = false;

    public $cliente = '';
    public $linea_primaria = '';
    public $estado = 'pendiente';
    public $valor = 0;
    public $fecha_apertura;
    public $fecha_cierre;
    public $fecha_facturacion;
    public $estado_negocio = '';
    public $incoterm = '';
    public $anticipos = '';
    public $tiempos_entrega = '';
    public $forma_pago = '';
    public $facturacion = '';
    public $actas_cierre = '';
    public $observaciones = '';

    public $facturas = [];
    public $newNumeroFactura = '';
    public $newFechaFactura = '';
    public $newValorFactura = '';
    public $newDescripcionFactura = '';
    public $facturaEditIndex = null;

    public $auditorias = [];

    protected $listeners = ['refresh-form' => 'refreshForm'];

    public function mount($seguimientoId = null)
    {
        $this->seguimientoId = $seguimientoId;
        $this->isAdmin = auth()->user() && auth()->user()->isAdmin();

        if ($this->seguimientoId) {
            $this->editMode = true;
            $this->loadSeguimiento();
        } else {
            $this->fecha_apertura = now()->format('Y-m-d');
        }
    }

    public $isAdmin = false;

    public function refreshForm($id = null)
    {
        $this->seguimientoId = $id;
        
        if ($this->seguimientoId) {
            $this->editMode = true;
            $this->loadSeguimiento();
        } else {
            $this->editMode = false;
            $this->resetForm();
        }
    }

    protected function resetForm()
    {
        $this->cliente = '';
        $this->linea_primaria = '';
        $this->estado = 'pendiente';
        $this->valor = 0;
        $this->fecha_apertura = now()->format('Y-m-d');
        $this->fecha_cierre = null;
        $this->fecha_facturacion = null;
        $this->estado_negocio = '';
        $this->incoterm = '';
        $this->anticipos = '';
        $this->tiempos_entrega = '';
        $this->forma_pago = '';
        $this->facturacion = '';
        $this->actas_cierre = '';
        $this->observaciones = '';
        $this->facturas = [];
        $this->auditorias = [];
        $this->reset(['newNumeroFactura', 'newFechaFactura', 'newValorFactura', 'newDescripcionFactura', 'facturaEditIndex']);
    }

    public function loadSeguimiento()
    {
        $seg = Seguimiento::with('facturas')->find($this->seguimientoId);
        
        if ($seg) {
            $this->cliente = $seg->cliente;
            $this->linea_primaria = $seg->linea_primaria;
            $this->estado = $seg->estado;
            $this->valor = $seg->valor;
            $this->fecha_apertura = $seg->fecha_apertura?->format('Y-m-d');
            $this->fecha_cierre = $seg->fecha_cierre?->format('Y-m-d');
            $this->fecha_facturacion = $seg->fecha_facturacion?->format('Y-m-d');
            $this->estado_negocio = $seg->estado_negocio;
            $this->incoterm = $seg->incoterm;
            $this->anticipos = $seg->anticipos;
            $this->tiempos_entrega = $seg->tiempos_entrega;
            $this->forma_pago = $seg->forma_pago;
            $this->facturacion = $seg->facturacion;
            $this->actas_cierre = $seg->actas_cierre;
            $this->observaciones = $seg->observaciones;

            $this->facturas = $seg->facturas->map(fn($f) => [
                'numero_factura' => $f->numero_factura,
                'fecha' => $f->fecha?->format('Y-m-d'),
                'valor' => $f->valor,
                'descripcion' => $f->descripcion,
            ])->toArray();

            $this->auditorias = $seg->auditorias->map(fn($a) => [
                'usuario' => $a->usuario,
                'fecha' => $a->fecha?->format('Y-m-d H:i'),
                'campo' => $a->campo,
                'valor_anterior' => $a->valor_anterior,
                'valor_nuevo' => $a->valor_nuevo,
            ])->toArray();
        }
    }

    public function save()
    {
        $this->validate([
            'cliente' => 'required|string|max:255',
            'estado' => 'required|string',
        ]);

        $data = [
            'cliente' => $this->cliente,
            'linea_primaria' => $this->linea_primaria,
            'estado' => $this->estado,
            'valor' => $this->valor,
            'fecha_apertura' => $this->fecha_apertura,
            'fecha_cierre' => $this->fecha_cierre,
            'fecha_facturacion' => $this->fecha_facturacion,
            'estado_negocio' => $this->estado_negocio,
            'incoterm' => $this->incoterm,
            'anticipos' => $this->anticipos,
            'tiempos_entrega' => $this->tiempos_entrega,
            'forma_pago' => $this->forma_pago,
            'facturacion' => $this->facturacion,
            'actas_cierre' => $this->actas_cierre,
            'observaciones' => $this->observaciones,
        ];

        if ($this->editMode) {
            $seguimiento = Seguimiento::find($this->seguimientoId);
            $seguimiento->update($data);
        } else {
            $seguimiento = Seguimiento::create($data);
            $this->seguimientoId = $seguimiento->id;
            $this->editMode = true;
        }

        $this->dispatch('close-modal');
    }

    public function addFactura()
    {
        if ($this->newNumeroFactura) {
            $this->facturas[] = [
                'numero_factura' => $this->newNumeroFactura,
                'fecha' => $this->newFechaFactura,
                'valor' => $this->newValorFactura,
                'descripcion' => $this->newDescripcionFactura,
            ];

            $this->saveFacturasToDb();

            $this->reset(['newNumeroFactura', 'newFechaFactura', 'newValorFactura', 'newDescripcionFactura']);
        }
    }

    public function editFactura($index)
    {
        $this->facturaEditIndex = $index;
        $factura = $this->facturas[$index];
        $this->newNumeroFactura = $factura['numero_factura'];
        $this->newFechaFactura = $factura['fecha'];
        $this->newValorFactura = $factura['valor'];
        $this->newDescripcionFactura = $factura['descripcion'];
    }

    public function updateFactura($index)
    {
        $this->facturas[$index] = [
            'numero_factura' => $this->newNumeroFactura,
            'fecha' => $this->newFechaFactura,
            'valor' => $this->newValorFactura,
            'descripcion' => $this->newDescripcionFactura,
        ];

        $this->saveFacturasToDb();
        $this->cancelEditFactura();
    }

    public function cancelEditFactura()
    {
        $this->facturaEditIndex = null;
        $this->reset(['newNumeroFactura', 'newFechaFactura', 'newValorFactura', 'newDescripcionFactura']);
    }

    public function deleteFactura($index)
    {
        if (isset($this->facturas[$index])) {
            unset($this->facturas[$index]);
            $this->facturas = array_values($this->facturas);
            $this->saveFacturasToDb();
        }
    }

    protected function saveFacturasToDb()
    {
        $seguimiento = Seguimiento::find($this->seguimientoId);
        if (!$seguimiento) return;

        $seguimiento->facturas()->delete();

        foreach ($this->facturas as $factura) {
            $seguimiento->facturas()->create([
                'numero_factura' => $factura['numero_factura'],
                'fecha' => $factura['fecha'],
                'valor' => $factura['valor'],
                'descripcion' => $factura['descripcion'],
            ]);
        }
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento-form');
    }
}
