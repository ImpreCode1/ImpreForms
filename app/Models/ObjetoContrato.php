<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetoContrato extends Model
{
    use HasFactory;

    protected $table = 'objeto_contrato';

    protected $fillable = [
        'marca_id',
        'descripcion',
        'cantidad',
        'tipo',
        'precio_unitario',
        'precio_total',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
