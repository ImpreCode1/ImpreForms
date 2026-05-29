<?php

namespace App\Livewire\Traits;

trait InvertirNombre
{
    public function invertirNombre($nombre)
    {
        $nombre = trim($nombre);
        if (strpos($nombre, ' ') !== false) {
            $partes = explode(' ', $nombre, 2);
            return $partes[1] . ' ' . $partes[0];
        }
        return $nombre;
    }
}
