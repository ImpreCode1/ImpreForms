<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    protected $table = 'executives';

    protected $fillable = [
        'cc',
        'nombre_colaborador',
        'cargo',
        'area_vp',
        'subarea_division',
        'mail',
        'codigo_area_funcional_ceco',
        'estado',
        'nombre',
        'email',
        'activo',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}