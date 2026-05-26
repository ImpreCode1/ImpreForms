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
        $nombre = $this->nombre_director;
        if (!str_contains($nombre, '  ')) {
            return ucwords(strtolower($nombre));
        }
        $partes = explode('  ', $nombre, 2);
        $apellido1 = trim($partes[0]);
        $resto = explode(' ', trim($partes[1]));
        $apellido2 = array_shift($resto);
        $nombres = implode(' ', $resto);
        $completo = trim("$nombres $apellido1 $apellido2");
        return ucwords(strtolower($completo));
    }
}