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
        'facturacion_moneda',
        'trm',
        'cuenta_compensacion',
        'saldo_restante_porcentaje',
        'saldo_restante_valor',
        'saldo_restante_fecha_pago',
        'otras_observaciones',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
    }
}
