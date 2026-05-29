<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $table = 'lineas';
    protected $fillable = [
        'codigo_linea', 'linea', 'activo'
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}