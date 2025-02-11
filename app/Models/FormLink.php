<?php

namespace App\Models;

use Carbon\Carbon;
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
        'otros',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
    ];


    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }

    public function resetExpiration()
    {
        $this->expires_at = Carbon::now()->addMinutes(40);
        $this->save();
    }
}
