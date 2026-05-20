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

    public function getNombreColaboradorFormattedAttribute()
    {
        $nombre = $this->attributes['nombre_colaborador'] ?? '';
        if (strpos($nombre, ' ') !== false) {
            $partes = explode(' ', trim($nombre), 2);
            return $partes[1] . ' ' . $partes[0];
        }
        return $nombre;
    }
}