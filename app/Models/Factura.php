<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'seguimiento_id',
        'numero_factura',
        'fecha',
        'valor',
        'descripcion',
        'acta_cierre',
    ];

    protected $casts = [
        'fecha' => 'date',
        'valor' => 'decimal:2',
    ];

    public function seguimiento(): BelongsTo
    {
        return $this->belongsTo(Seguimiento::class);
    }
}