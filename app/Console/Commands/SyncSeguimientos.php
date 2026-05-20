<?php

namespace App\Console\Commands;

use App\Models\Marca;
use App\Models\Seguimiento;
use Illuminate\Console\Command;

class SyncSeguimientos extends Command
{
    protected $signature   = 'seguimientos:sync';
    protected $description = 'Crea un Seguimiento para cada Marca que no tenga uno';

    public function handle(): int
    {
        $marcas = Marca::with('infonegocio')
            ->doesntHave('seguimiento')
            ->get();

        if ($marcas->isEmpty()) {
            $this->info('Todas las marcas ya tienen seguimiento.');
            return self::SUCCESS;
        }

        $this->info("Sincronizando {$marcas->count()} marca(s)...");
        $bar = $this->output->createProgressBar($marcas->count());
        $bar->start();

        foreach ($marcas as $marca) {
            Seguimiento::create([
                'marca_id'       => $marca->id,
                'cliente'        => $marca->infonegocio->nombre ?? null,
                'linea_primaria' => $marca->linea ?? null,
                'fecha_apertura' => $marca->created_at?->toDateString(),
                'valor'          => self::parseValor($marca->precio_venta),
                'estado'         => 'pendiente',
            ]);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Sincronización completada.');

        return self::SUCCESS;
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
        } elseif (str_contains($clean, ',') && !str_contains($clean, '.')) {
            $clean = str_replace(',', '.', $clean);
        } else {
            $clean = str_replace(',', '', $clean);
        }
        return is_numeric($clean) ? (float) $clean : null;
    }
}
