<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';

    protected $fillable = [
        'marca_id',
        'cliente',
        'linea_primaria',
        'estado',
        'valor',
        'fecha_apertura',
        'fecha_cierre',
        'fecha_facturacion',
        'estado_negocio',
        'incoterm',
        'anticipos',
        'tiempos_entrega',
        'forma_pago',
        'facturacion',
        'actas_cierre',
        'observaciones',
    ];

    protected $casts = [
        'fecha_apertura' => 'date',
        'fecha_cierre' => 'date',
        'fecha_facturacion' => 'date',
        'valor' => 'decimal:2',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function auditorias()
    {
        return $this->hasMany(AuditoriaSeguimiento::class);
    }
}
