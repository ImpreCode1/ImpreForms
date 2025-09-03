<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Marca;
use Carbon\Carbon;

class EliminarRegistrosVencidos extends Command
{
    protected $signature = 'eliminar:registros-vencidos';
    protected $description = 'Eliminar registros (y sus relaciones) con más de 1 año de antigüedad';

    public function handle()
    {
        $limite = Carbon::now()->subYears(1);

        $marcas = Marca::where('created_at', '<', $limite)->get();

        if ($marcas->isEmpty()) {
            $this->info("No hay registros con más de 1 año de antigüedad.");
            return;
        }

        foreach ($marcas as $marca) {
            DB::transaction(function () use ($marca) {
                // Eliminar documentos
                foreach ($marca->documento as $doc) {
                    Storage::disk('public')->delete($doc->ruta_documento);
                    $doc->delete();
                }

                // Eliminar infoEntrega
                foreach ($marca->infoEntrega as $entrega) {
                    $entrega->delete();
                }

                // Eliminar informacion y sus productos
                foreach ($marca->informacion as $info) {
                    foreach ($info->producto as $prod) {
                        $prod->delete();
                    }
                    $info->delete();
                }

                // Eliminar pagos
                foreach ($marca->pago as $pago) {
                    $pago->delete();
                }

                // Eliminar financieras
                foreach ($marca->financiera as $fin) {
                    $fin->delete();
                }

                // 🔹 Eliminar links asociados en form_links
                foreach ($marca->formLinks as $link) {
                    $link->delete();
                }

                // Finalmente, eliminar la marca
                $marca->delete();
            });
        }

        $this->info("✅ Se eliminaron {$marcas->count()} marcas con sus relaciones (incluyendo form_links).");
    }
}
