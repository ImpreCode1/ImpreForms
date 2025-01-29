<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infoentrega extends Model
{
    use HasFactory;

    protected $table = 'info_entrega';

    protected $fillable = [
        'marcas_id',
        'entrega_cliente',
        'lugar_entrega',
        'pais',
        'puerto',
        'incoterm',
        'transporte',
        'origen',
        'destino',
        'condiciones',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
    }

}
