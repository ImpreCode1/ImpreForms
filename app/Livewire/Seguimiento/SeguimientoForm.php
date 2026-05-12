<?php

namespace App\Livewire\Seguimiento;

use App\Models\AuditoriaObservacion;
use App\Models\Factura;
use App\Models\Seguimiento;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SeguimientoForm extends Component
{
    public ?int $seguimientoId = null;
    public bool $editMode = false;

    #[Rule('required|string|max:255')]
    public string $cliente = '';

    #[Rule('nullable|string|max:255')]
    public string $linea_primaria = '';

    #[Rule('nullable|date')]
    public ?string $fecha_apertura = null;

    #[Rule('nullable|date')]
    public ?string $fecha_cierre = null;

    #[Rule('nullable|date')]
    public ?string $fecha_facturacion = null;

    #[Rule('nullable|numeric|min:0')]
    public ?string $valor = null;

    #[Rule('nullable|string|max:255')]
    public string $estado_negocio = '';

    #[Rule('required|in:anulado,declinado,en_proceso,facturado,facturado_y_pagado,pendiente,recurrencia')]
    public string $estado = 'pendiente';

    #[Rule('nullable|string|max:100')]
    public string $incoterm = '';

    #[Rule('nullable|string')]
    public string $anticipos = '';

    #[Rule('nullable|string')]
    public string $tiempos_entrega = '';

    #[Rule('nullable|string')]
    public string $forma_pago = '';

    #[Rule('nullable|string')]
    public string $facturacion = '';

    #[Rule('nullable|string')]
    public string $actas_cierre = '';

    #[Rule('nullable|string')]
    public string $observaciones = '';

    public array $facturas = [];
    public array $auditorias = [];

    public ?int $facturaEditIndex = null;
    public string $newNumeroFactura = '';
    public ?string $newFechaFactura = null;
    public ?string $newValorFactura = null;
    public string $newDescripcionFactura = '';

    public function mount(?int $seguimientoId = null)
    {
        abort_unless(Auth::check(), 401);

        $this->seguimientoId = $seguimientoId;

        if ($this->seguimientoId) {
            $this->editMode = true;
            $this->loadSeguimiento();
        }
    }

    protected function loadSeguimiento()
    {
        $seguimiento = Seguimiento::with('facturas')->find($this->seguimientoId);

        if ($seguimiento) {
            $this->cliente = $seguimiento->cliente ?? '';
            $this->linea_primaria = $seguimiento->linea_primaria ?? '';
            $this->fecha_apertura = $seguimiento->fecha_apertura?->format('Y-m-d');
            $this->fecha_cierre = $seguimiento->fecha_cierre?->format('Y-m-d');
            $this->fecha_facturacion = $seguimiento->fecha_facturacion?->format('Y-m-d');
            $this->valor = $seguimiento->valor ? (string) $seguimiento->valor : null;
            $this->estado_negocio = $seguimiento->estado_negocio ?? '';
            $this->estado = $seguimiento->estado ?? 'pendiente';
            $this->incoterm = $seguimiento->incoterm ?? '';
            $this->anticipos = $seguimiento->anticipos ?? '';
            $this->tiempos_entrega = $seguimiento->tiempos_entrega ?? '';
            $this->forma_pago = $seguimiento->forma_pago ?? '';
            $this->facturacion = $seguimiento->facturacion ?? '';
            $this->actas_cierre = $seguimiento->actas_cierre ?? '';
            $this->observaciones = $seguimiento->observaciones ?? '';

            $this->facturas = $seguimiento->facturas->map(function ($f) {
                return [
                    'id' => $f->id,
                    'numero_factura' => $f->numero_factura,
                    'fecha' => $f->fecha?->format('Y-m-d'),
                    'valor' => $f->valor ? (string) $f->valor : null,
                    'descripcion' => $f->descripcion ?? '',
                    'acta_cierre' => $f->acta_cierre ?? '',
                ];
            })->toArray();

            $this->loadAuditorias();
        }
    }

    protected function loadAuditorias()
    {
        $this->auditorias = AuditoriaObservacion::with('user')
            ->where('seguimiento_id', $this->seguimientoId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($a) {
                return [
                    'usuario' => $a->user?->name ?? 'Usuario',
                    'fecha' => $a->created_at?->format('d/m/Y H:i'),
                    'campo' => $a->campo,
                    'valor_anterior' => $a->valor_anterior,
                    'valor_nuevo' => $a->valor_nuevo,
                ];
            })->toArray();
    }

    public function isAdmin(): bool
    {
        return Auth::user()->isAdmin();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'cliente' => $this->cliente,
            'linea_primaria' => $this->linea_primaria,
            'fecha_apertura' => $this->fecha_apertura,
            'fecha_cierre' => $this->fecha_cierre,
            'fecha_facturacion' => $this->fecha_facturacion,
            'valor' => $this->valor ? (float) $this->valor : null,
            'estado_negocio' => $this->estado_negocio,
            'estado' => $this->estado,
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
            $oldObservaciones = $seguimiento->observaciones;
            $seguimiento->update($data);

            if ($this->observaciones !== $oldObservaciones) {
                AuditoriaObservacion::create([
                    'seguimiento_id' => $this->seguimientoId,
                    'user_id' => Auth::id(),
                    'campo' => 'observaciones',
                    'valor_anterior' => $oldObservaciones,
                    'valor_nuevo' => $this->observaciones,
                    'created_at' => now(),
                ]);
            }
        } else {
            $seguimiento = Seguimiento::create($data);
            $this->seguimientoId = $seguimiento->id;
            $this->editMode = true;
        }

        $this->loadSeguimiento();
    }

    public function addFactura()
    {
        $this->validate([
            'newNumeroFactura' => 'required|string|max:255',
            'newFechaFactura' => 'nullable|date',
            'newValorFactura' => 'nullable|numeric|min:0',
            'newDescripcionFactura' => 'nullable|string',
        ]);

        Factura::create([
            'seguimiento_id' => $this->seguimientoId,
            'numero_factura' => $this->newNumeroFactura,
            'fecha' => $this->newFechaFactura,
            'valor' => $this->newValorFactura ? (float) $this->newValorFactura : null,
            'descripcion' => $this->newDescripcionFactura,
        ]);

        $this->reset(['newNumeroFactura', 'newFechaFactura', 'newValorFactura', 'newDescripcionFactura']);
        $this->loadSeguimiento();
    }

    public function editFactura(int $index)
    {
        $factura = $this->facturas[$index];
        $this->facturaEditIndex = $index;
        $this->newNumeroFactura = $factura['numero_factura'];
        $this->newFechaFactura = $factura['fecha'];
        $this->newValorFactura = $factura['valor'];
        $this->newDescripcionFactura = $factura['descripcion'];
    }

    public function updateFactura(int $index)
    {
        $factura = $this->facturas[$index];
        $facturaModel = Factura::find($factura['id']);

        $facturaModel->update([
            'numero_factura' => $this->newNumeroFactura,
            'fecha' => $this->newFechaFactura,
            'valor' => $this->newValorFactura ? (float) $this->newValorFactura : null,
            'descripcion' => $this->newDescripcionFactura,
        ]);

        $this->cancelEditFactura();
        $this->loadSeguimiento();
    }

    public function cancelEditFactura()
    {
        $this->facturaEditIndex = null;
        $this->reset(['newNumeroFactura', 'newFechaFactura', 'newValorFactura', 'newDescripcionFactura']);
    }

    public function deleteFactura(int $index)
    {
        $factura = $this->facturas[$index];
        Factura::find($factura['id'])->delete();
        $this->loadSeguimiento();
    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento-form', [
            'isAdmin' => $this->isAdmin(),
        ]);
    }
}