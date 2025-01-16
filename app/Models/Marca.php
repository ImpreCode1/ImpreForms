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
        'user_id',
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
        return $this->belongsTo(Infonegocio::class );
    }

    public function informacion()
    {
        return $this->hasMany(Informacion::class, 'marcas_id');
    }


    public function pago()
    {
        return $this->hasMany(Pago::class, 'marcas_id');
    }

    public function infoEntrega()
    {
        return $this->hasMany(Infoentrega::class);
    }

    public function financiera()
    {
        return $this->hasMany(Financiera::class, 'marcas_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
