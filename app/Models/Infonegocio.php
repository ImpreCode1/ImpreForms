<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infonegocio extends Model
{
    use HasFactory;

    protected $table = 'infonegocio';

    protected $fillable = [
        'codigo_cliente',
        'nombre',
        'correo',
        'numero_celular',
        'n_oportunidad_crm',
        'nom_rep',
    ];

    public function marcas()
    {
        return $this->hasMany(Marca::class);
    }

}
