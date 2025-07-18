<?php

namespace App\Imports;

use App\Models\Executive;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExecutivesImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Executive([
            'cc' => $row['cc'] ?? null,
            'nombre_colaborador' => $row['nombre_colaborador'] ?? null,
            'cargo' => $row['cargo'] ?? null,
            'area_vp' => $row['area_vp'] ?? null,
            'subarea_division' => $row['subarea_division'] ?? null,
            'mail' => $row['mail_o_correo_electronico'] ?? null,
            'codigo_area_funcional_ceco' => $row['codigo_area_funcional_ceco'] ?? null,
            'estado' => $row['estado'] ?? null,
        ]);
    }
}
