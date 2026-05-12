<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $fillable = [
        'seguimiento_id',
        'numero_factura',
        'fecha',
        'valor',
        'descripcion',
    ];

    protected $casts = [
        'fecha' => 'date',
        'valor' => 'decimal:2',
    ];

    public function seguimiento()
    {
        return $this->belongsTo(Seguimiento::class);
    }
}
