<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'informacion_id',
        'detalles_equipos',
        'aplica_garantia',
        'termino_garantia',
        'aplica_poliza',
        'porcentaje_poliza',
    ];

    public function informacion()
    {
        return $this->belongsTo(Informacion::class);
    }

}
