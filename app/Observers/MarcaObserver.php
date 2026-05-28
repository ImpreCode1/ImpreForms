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

        $this->syncSeguimiento($marca);
    }

    public function updated(Marca $marca): void
    {
        $this->syncSeguimiento($marca);
    }

    protected function syncSeguimiento(Marca $marca): void
    {
        $marca->loadMissing('infonegocio', 'informacion', 'pago');

        $info = $marca->informacion->first();
        $pago = $marca->pago->first();

        $tiempos = '';
        if ($info?->tiempo_entrega_cantidad || $info?->tiempo_entrega_unidad) {
            $tiempos = trim(($info->tiempo_entrega_cantidad ?? '') . ' ' . ($info->tiempo_entrega_unidad ?? ''));
        }

        Seguimiento::updateOrCreate(
            ['marca_id' => $marca->id],
            [
                'cliente'            => $marca->infonegocio?->nombre,
                'linea_primaria'     => $marca->linea,
                'valor'              => self::parseValor($marca->precio_venta),
                'fecha_apertura'     => $marca->created_at?->toDateString(),
                'incoterm'           => $info?->tipo_incoterms,
                'tiempos_entrega'    => $tiempos ?: null,
                'fecha_cierre'       => $info?->fecha_finalizacion,
                'fecha_facturacion'  => $pago?->fecha_pago,
                'forma_pago'         => $marca->forma_pago,
                'crm_sync_at'        => now(),
            ]
        );
    }

    private static function parseValor(?string $raw): ?float
    {
        if ($raw === null || $raw === '') {
            return null;
        }

        $clean = preg_replace('/[^\d.,]/', '', $raw);

        if (preg_match('/\d{1,3}(\.\d{3})+(,\d+)?$/', $clean)) {
            $clean = str_replace('.', '', $clean);
            $clean = str_replace(',', '.', $clean);
        } elseif (preg_match('/\d{1,3}(,\d{3})+(\.\d+)?$/', $clean)) {
            $clean = str_replace(',', '', $clean);
        } elseif (str_contains($clean, ',') && !str_contains($clean, '.')) {
            $clean = str_replace(',', '.', $clean);
        } else {
            $clean = str_replace(',', '', $clean);
        }

        return is_numeric($clean) ? (float) $clean : null;
    }
}
