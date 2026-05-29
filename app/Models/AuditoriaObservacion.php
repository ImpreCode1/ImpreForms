<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditoriaObservacion extends Model
{
    public $timestamps = false;

    const UPDATED_AT = null;

    protected $table = 'auditoria_observaciones';

    protected $fillable = [
        'seguimiento_id',
        'user_id',
        'campo',
        'valor_anterior',
        'valor_nuevo',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function seguimiento(): BelongsTo
    {
        return $this->belongsTo(Seguimiento::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}