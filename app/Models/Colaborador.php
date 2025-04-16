<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'colaboradores';
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

    public function director()
    {

        return $this->belongsTo(Director::class, 'area_vp', 'area_vp')
        ->where('subarea_division', $this->subarea_division);
    }

}
