<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLink extends Model
{
    use HasFactory;

    protected $table = 'form_links'; // 👈 muy importante

    protected $fillable = [
        'marca_id',
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
        'completed_at',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
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

    public function isCompleted()
    {
        return !is_null($this->completed_at);
    }
}
