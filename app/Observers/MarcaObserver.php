<?php

namespace App\Observers;

use App\Models\Marca;
use App\Models\Seguimiento;

class MarcaObserver
{
    public function created(Marca $marca): void
    {
        if ($marca->seguimiento()->exists()) {
            return;
        }

        $marca->loadMissing('infonegocio');

        Seguimiento::create([
            'marca_id'       => $marca->id,
            'cliente'        => $marca->infonegocio->nombre ?? null,
            'linea_primaria' => $marca->linea ?? null,
            'fecha_apertura' => $marca->created_at?->toDateString(),
            'valor'          => self::parseValor($marca->precio_venta),
            'estado'         => 'pendiente',
        ]);
    }

    private static function parseValor(?string $raw): ?float
    {
        if ($raw === null || $raw === '') {
            return null;
        }
        // Eliminar cualquier carácter que no sea dígito, punto o coma
        $clean = preg_replace('/[^\d.,]/', '', $raw);
        // Si usa punto como separador de miles y coma decimal: "1.000.000,50"
        if (preg_match('/\d{1,3}(\.\d{3})+(,\d+)?$/', $clean)) {
            $clean = str_replace('.', '', $clean);
            $clean = str_replace(',', '.', $clean);
        } elseif (str_contains($clean, ',') && !str_contains($clean, '.')) {
            // Coma como decimal: "1000000,50"
            $clean = str_replace(',', '.', $clean);
        } else {
            // Punto como decimal o sin decimales: "1000000" / "1000000.50"
            $clean = str_replace(',', '', $clean);
        }
        return is_numeric($clean) ? (float) $clean : null;
    }
}
