<?php

namespace App\Exports;

use App\Models\Seguimiento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SeguimientosExport implements
    FromQuery,
    WithHeadings,
    WithMapping,
    WithStyles,
    WithTitle
{
    public function __construct(
        private string $filtroEstado = '',
        private string $filtroBusqueda = ''
    ) {}

    public function query()
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
            ->orderBy('fecha_apertura', 'desc');
    }

    public function title(): string
    {
        return 'BASE PROYECTOS';
    }

    public function headings(): array
    {
        return [
            'N° Oportunidad',
            'Cliente',
            'Línea Primera',
            'Valor (COP)',
            'Estado Negocio',
            'Estado',
            'Incoterm',
            'Anticipos',
            'Tiempos de Entrega',
            'Forma de Pago',
            'Facturación',
            'Actas de Cierre',
            'Observaciones',
            'Fecha Apertura',
            'Fecha Cierre',
            'Fecha Facturación',
        ];
    }

    public function map($seg): array
    {
        return [
            $seg->id,
            $seg->cliente,
            $seg->linea_primaria ?? '—',
            $seg->valor ? number_format((float) $seg->valor, 0, ',', '.') : '—',
            $seg->estado_negocio ?? '—',
            ucfirst(str_replace('_', ' ', $seg->estado)),
            $seg->incoterm ?? '—',
            $seg->anticipos ?? '—',
            $seg->tiempos_entrega ?? '—',
            $seg->forma_pago ?? '—',
            $seg->facturacion ?? '—',
            $seg->actas_cierre ?? '—',
            $seg->observaciones ?? '—',
            $seg->fecha_apertura?->format('d/m/Y') ?? '—',
            $seg->fecha_cierre?->format('d/m/Y') ?? '—',
            $seg->fecha_facturacion?->format('d/m/Y') ?? '—',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastCol = 'P';

        $sheet->getStyle("A1:{$lastCol}1")->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 11],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => '1F3864']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'wrapText' => true],
        ]);

        for ($row = 2; $row <= $lastRow; $row++) {
            $color = ($row % 2 === 0) ? 'EEF2FF' : 'FFFFFF';
            $sheet->getStyle("A{$row}:{$lastCol}{$row}")->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => $color]],
                'alignment' => ['vertical' => Alignment::VERTICAL_TOP, 'wrapText' => true],
            ]);
        }

        $sheet->getStyle("A1:{$lastCol}{$lastRow}")->applyFromArray([
            'borders' => ['allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => 'D1D5DB'],
            ]],
        ]);

        $sheet->getColumnDimension('A')->setWidth(12);
        $sheet->getColumnDimension('B')->setWidth(35);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(18);
        $sheet->getColumnDimension('E')->setWidth(22);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(12);
        $sheet->getColumnDimension('H')->setWidth(30);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(30);
        $sheet->getColumnDimension('M')->setWidth(45);
        $sheet->getColumnDimension('N')->setWidth(15);
        $sheet->getColumnDimension('O')->setWidth(15);
        $sheet->getColumnDimension('P')->setWidth(18);

        $sheet->getRowDimension(1)->setRowHeight(30);
        $sheet->setAutoFilter("A1:{$lastCol}1");
        $sheet->freezePane('A2');

        return [];
    }
}
