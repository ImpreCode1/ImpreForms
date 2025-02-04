<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id',
        // 'name',
        'link',
        'type',
        'cliente',
        'crm',
        'nombre',
        'forma_pago',
        'moneda',
        'otros'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
