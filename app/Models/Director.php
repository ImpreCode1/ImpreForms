<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';
    protected $fillable = [
        'nombre_director', 'mail', 'cargo', 'activo'
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function getNombreDirectorFormattedAttribute()
    {
        $nombre = $this->attributes['nombre_director'] ?? '';
        if (strpos($nombre, ' ') !== false) {
            $partes = explode(' ', trim($nombre), 2);
            return $partes[1] . ' ' . $partes[0];
        }
        return $nombre;
    }
}