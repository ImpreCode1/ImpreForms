<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimientos';

    protected $fillable = [
        'marca_id',
        'cliente',
        'linea_primaria',
        'fecha_apertura',
        'fecha_cierre',
        'fecha_facturacion',
        'valor',
        'estado_negocio',
        'estado',
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

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function facturas(): HasMany
    {
        return $this->hasMany(Factura::class);
    }

    public function auditoriaObservaciones(): HasMany
    {
        return $this->hasMany(AuditoriaObservacion::class);
    }
}