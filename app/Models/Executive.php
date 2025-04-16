<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    use HasFactory;

    protected $fillable = [
        'cc',
        'nombre_colaborador',
        'cargo',
        'area_vp',
        'subarea_division',
        'mail',
        'codigo_area_funcional_ceco',
        'estado',
    ];
}
