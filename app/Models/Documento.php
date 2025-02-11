<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'marcas_id',
        'tipo_documento',
        'nombre_original',
        'ruta_documento',
        'fecha_subida',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class,'marcas_id');
    }
}

