<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financiera extends Model
{
    use HasFactory;

    protected $table = 'financiera';

    protected $fillable = [
        'marcas_id',
        'plazo',
        'forma_pago',
        'moneda',
        'garantiascredit',
        'existencia_anticipo',
        'porcentaje',
        'fecha_pago',
        'otros',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
    }
}
