<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{

    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = [
        'infonegocio_id',
        'fecha',
        'n_oc',
        'precio_venta',
        'adjunto_cotizacion',
        'tipo_contrato',
        'linea',
        'codigo_linea',
        'nombre',
        'telefono',
        'correo_electronico',
        'otro',
        'cel',
        'email',
        'director',
        'numero',
        'correo_director',
    ];

    public function infonegocio()
    {
        return $this->belongsTo(InfoNegocio::class);
    }

    public function informacion()
    {
        return $this->hasMany(Informacion::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function infoEntrega()
    {
        return $this->hasMany(InfoEntrega::class);
    }

    public function financiera()
    {
        return $this->hasMany(Financiera::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }


}
