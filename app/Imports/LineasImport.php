<?php

namespace App\Imports;

use App\Models\Linea;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LineasImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Linea([
            'codigo_linea' => $row['codigo_linea'] ?? null,
            'linea' => $row['linea'] ?? null,
        ]);

    }
}
