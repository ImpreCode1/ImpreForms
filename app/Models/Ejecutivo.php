<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    protected $table = 'executives';
    protected $fillable = [
        'nombre_colaborador', 'mail', 'activo'
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}