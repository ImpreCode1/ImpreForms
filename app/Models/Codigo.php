<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    use HasFactory;
    protected $table = 'codigos';

    protected $fillable = [
        'codigo_cliente',
        'nombre_cliente',
    ];
}
