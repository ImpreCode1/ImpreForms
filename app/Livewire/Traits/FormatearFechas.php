<?php

namespace App\Livewire\Traits;

trait FormatearFechas
{
    public function formatearFecha($fecha)
    {
        return $fecha ? date('Y-m-d', strtotime($fecha)) : null;
    }
}
