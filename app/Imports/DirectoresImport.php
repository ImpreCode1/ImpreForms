<?php

namespace App\Imports;

use App\Models\Director;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DirectoresImport implements ToModel , WithHeadingRow
{

    public function model(array $row)
    {
        return new Director([
            'nombre_director' => $row['nombre_director'] ?? null,
            'cargo' => $row['cargo'] ?? null,
            'area_vp' => $row['area_vp'] ?? null,
            'subarea_division' => $row['subarea_division'] ?? null,
            'mail' => $row['mail_o_correo_electronico'] ?? null,
        ]);

    }
}
