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

    public function getNombreColaboradorFormattedAttribute()
    {
        try {
            $nombre = trim($this->nombre_colaborador ?? '');
            if (empty($nombre)) return '';

            if (!str_contains($nombre, '  ')) {
                return ucwords(strtolower($nombre));
            }

            $partes = explode('  ', $nombre, 2);
            $apellido1 = trim($partes[0]);
            $palabras = array_filter(explode(' ', trim($partes[1])));
            $palabras = array_values($palabras);

            if (count($palabras) === 0) return ucwords(strtolower($nombre));
            if (count($palabras) === 1) return ucwords(strtolower($palabras[0] . ' ' . $apellido1));

            $apellido2 = $palabras[0];
            $nombres = implode(' ', array_slice($palabras, 1));
            $completo = trim("$nombres $apellido1 $apellido2");
            return ucwords(strtolower($completo));
        } catch (\Exception $e) {
            return ucwords(strtolower($this->nombre_colaborador ?? ''));
        }
    }
}
