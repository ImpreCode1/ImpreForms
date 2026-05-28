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

    public function getNumeroOportunidadAttribute()
    {
        return $this->marca?->infonegocio?->n_oportunidad_crm;
    }

    public function getLineaPrimariaDisplayAttribute()
    {
        return $this->marca?->linea ?? $this->linea_primaria;
    }

    public function getValorDisplayAttribute()
    {
        if ($this->marca && $this->marca->precio_venta) {
            $precio = str_replace(',', '', $this->marca->precio_venta);
            return '$' . number_format((float)$precio, 0, ',', '.')
                . ($this->marca->moneda_precio_venta ? ' ' . $this->marca->moneda_precio_venta : '');
        }
        if ($this->valor) {
            $precio = str_replace(',', '', $this->valor);
            return '$' . number_format((float)$precio, 0, ',', '.');
        }
        return null;
    }

    public function getIncoTermDisplayAttribute()
    {
        return $this->marca?->informacion->first()?->tipo_incoterms ?? $this->incoterm;
    }

    public function getTiemposEntregaDisplayAttribute()
    {
        $info = $this->marca?->informacion->first();
        $cantidad = $info?->tiempo_entrega_cantidad;
        $unidad = $info?->tiempo_entrega_unidad;

        if ($cantidad || $unidad) {
            return trim(($cantidad ?? '') . ' ' . ($unidad ?? ''));
        }
        return $this->tiempos_entrega;
    }

    public function getFechaAperturaDisplayAttribute()
    {
        return $this->marca?->created_at?->format('Y-m-d') ?? $this->fecha_apertura?->format('Y-m-d');
    }

    public function getFechaCierreDisplayAttribute()
    {
        $fecha = $this->marca?->informacion->first()?->fecha_finalizacion;
        if ($fecha) {
            return \Carbon\Carbon::parse($fecha)->format('Y-m-d');
        }
        return $this->fecha_cierre?->format('Y-m-d');
    }

    public function getFechaFacturacionDisplayAttribute()
    {
        $fecha = $this->marca?->pago->first()?->fecha_pago;
        if ($fecha) {
            return \Carbon\Carbon::parse($fecha)->format('Y-m-d');
        }
        return $this->fecha_facturacion?->format('Y-m-d');
    }
}
