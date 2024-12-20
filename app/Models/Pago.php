<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;


    protected $table = 'pago';

    protected $fillable = [
        'marcas_id',
        'fecha_pago',
        'incluye_iva',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

}
