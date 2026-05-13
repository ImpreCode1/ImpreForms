<?php

namespace App\Exports;

use App\Models\Seguimiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SeguimientosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Seguimiento::with('marca')->get()->map(function ($seg) {
            return [
                $seg->cliente,
                $seg->linea_primaria,
                $seg->estado,
                $seg->valor,
                $seg->fecha_apertura?->format('Y-m-d'),
                $seg->fecha_cierre?->format('Y-m-d'),
                $seg->fecha_facturacion?->format('Y-m-d'),
                $seg->estado_negocio,
                $seg->incoterm,
                $seg->anticipos,
                $seg->tiempos_entrega,
                $seg->forma_pago,
                $seg->facturacion,
                $seg->actas_cierre,
                $seg->observaciones,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Cliente',
            'Línea Primary',
            'Estado',
            'Valor',
            'Fecha Apertura',
            'Fecha Cierre',
            'Fecha Facturación',
            'Estado Negocio',
            'Incoterm',
            'Anticipos',
            'Tiempos Entrega',
            'Forma Pago',
            'Facturación',
            'Actas Cierre',
            'Observaciones',
        ];
    }
}