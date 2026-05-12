<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';
    protected $fillable = [
        'nombre_director', 'mail', 'cargo', 'activo'
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}