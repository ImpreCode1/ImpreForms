<?php

namespace App\Imports;

use App\Models\Colaborador;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ColaboradoresImport implements ToArray, WithStartRow
{

    public function startRow(): int
    {
        return 4;
    }

    public function array(array $rows)
    {
        foreach ($rows as $index => $row) {
            Log::info("Procesando fila {$index}:", $row);

            // Asegúrate de que la fila tenga suficientes columnas
            if (count($row) >= 8) {
                try {
                    Colaborador::create([
                        'cc' => $row[0] ?? null,
                        'nombre_colaborador' => $row[1] ?? null,
                        'cargo' => $row[2] ?? null,
                        'area_vp' => $row[3] ?? null,
                        'subarea_division' => $row[4] ?? null,
                        'mail' => $row[5] ?? null,
                        'codigo_area_funcional_ceco' => $row[6] ?? null,
                        'estado' => $row[7] ?? null,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error al crear colaborador en fila {$index}: " . $e->getMessage());
                }
            } else {
                Log::warning("La fila {$index} no tiene suficientes columnas");
            }
        }
    }
}
