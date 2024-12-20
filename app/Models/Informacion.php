<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;

    protected $table = 'informacion';

    protected $fillable = [
        'marcas_id',
        'realiza_entrega_cliente',
        'lugar_entrega',
        'pais',
        'tiempo_entrega',
        'fecha_inicio_termino',
        'tipo_incoterms',
        'servicio_a_prestar',
        'frecuencia_suministro',
        'fecha_inicio',
        'fecha_finalizacion',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
