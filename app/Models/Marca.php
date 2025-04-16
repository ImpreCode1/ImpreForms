<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = ['infonegocio_id', 'user_id', 'fecha', 'n_oc', 'precio_venta', 'adjunto_cotizacion', 'tipo_contrato', 'tipo_solicitud', 'linea', 'codigo_linea', 'nombre', 'telefono', 'correo_electronico', 'otro', 'cel', 'email', 'director', 'numero', 'correo_director', 'cod_ejc', 'nombre_ejc', 'telefono_ejc', 'email_ejc'];

    public function infonegocio()
    {
        return $this->belongsTo(Infonegocio::class);
    }

    public function informacion()
    {
        return $this->hasMany(Informacion::class, 'marcas_id');
    }

    public function pago()
    {
        return $this->hasMany(Pago::class, 'marcas_id');
    }

    public function infoEntrega()
    {
        return $this->hasMany(Infoentrega::class, 'marcas_id');
    }

    public function financiera()
    {
        return $this->hasMany(Financiera::class, 'marcas_id');
    }

    public function documento()
    {
        return $this->hasMany(Documento::class, 'marcas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formLinks()
    {
        return $this->hasMany(FormLink::class);
    }

    public function getEstadoAttribute()
    {
        $formulariosCompletos = $this->infonegocio && $this->informacion->isNotEmpty() && $this->financiera->isNotEmpty() && $this->infoEntrega->isNotEmpty() && !$this->financiera->contains('plazo', null);

        if ($formulariosCompletos) {
            return 'Completado';
        }

        if (!$this->infonegocio) {
            return 'Marcas';
        }

        if ($this->infonegocio && !$this->informacion->isNotEmpty()) {
            return 'Operaciones';
        }

        if ($this->informacion->isNotEmpty() && (!$this->financiera->isNotEmpty() || $this->financiera->contains('plazo', null))) {
            return 'Financiera';
        }

        if ($this->financiera->isNotEmpty() && !$this->infoEntrega->isNotEmpty()) {
            return 'Operaciones';
        }

        return 'En Proceso';
    }
}
