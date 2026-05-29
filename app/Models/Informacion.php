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
        'entrega_realizar',
        'lugar_entrega',
        'pais',
        'tiempo_entrega',
        'tiempo_entrega_cantidad',
        'tiempo_entrega_unidad',
        'fecha_inicio_termino',
        'tipo_incoterms',
        'servicio_a_prestar',
        'frecuencia_suministro',
        'fecha_inicio',
        'fecha_finalizacion',
        'cantidad_entregas',
        'fecha_entrega',
        'linea_especifica',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function producto()
    {
        return $this->hasMany(Producto::class, 'informacion_id');
    }

}
