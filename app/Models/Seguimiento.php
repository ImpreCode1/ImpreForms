<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';

    protected $fillable = [
        'marca_id',
        'numero_oportunidad',
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
        'crm_sync_at',
    ];

    protected $casts = [
        'fecha_apertura' => 'date',
        'fecha_cierre' => 'date',
        'fecha_facturacion' => 'date',
        'valor' => 'decimal:2',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function auditorias()
    {
        return $this->hasMany(AuditoriaObservacion::class);
    }

    public function getClienteDisplayAttribute()
    {
        return $this->marca?->infonegocio?->nombre ?? $this->cliente;
    }

    public function getLineaPrimariaDisplayAttribute()
    {
        return $this->linea_primaria;
    }

    public function getValorDisplayAttribute()
    {
        if ($this->valor) {
            $precio = str_replace(',', '', $this->valor);
            return '$' . number_format((float)$precio, 0, ',', '.');
        }
        return null;
    }

    public function getIncoTermDisplayAttribute()
    {
        return $this->incoterm;
    }

    public function getTiemposEntregaDisplayAttribute()
    {
        return $this->tiempos_entrega;
    }

    public function getFechaAperturaDisplayAttribute()
    {
        return $this->fecha_apertura?->format('Y-m-d');
    }

    public function getFechaCierreDisplayAttribute()
    {
        return $this->fecha_cierre?->format('Y-m-d');
    }

    public function getFechaFacturacionDisplayAttribute()
    {
        return $this->fecha_facturacion?->format('Y-m-d');
    }

    public function getAnticiposDisplayAttribute()
    {
        return $this->anticipos;
    }

    public function getFormaPagoDisplayAttribute()
    {
        return $this->forma_pago;
    }
}
