<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $table = 'directores';


    protected $fillable = [
        'nombre_director',
        'cargo',
        'area_vp',
        'subarea_division',
        'mail',
    ];
}
