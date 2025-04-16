<?php

namespace App\Imports;

use App\Models\Codigo;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CodigoCliente implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        return new Codigo([
            'codigo_cliente' => $row['codigo_cliente'] ?? null,
            'nombre_cliente' => $row['nombre_cliente'] ?? null,
        ]);
    }


}
