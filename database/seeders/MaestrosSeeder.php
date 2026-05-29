<?php

namespace Database\Seeders;

use App\Models\Ejecutivo;
use App\Models\Director;
use App\Models\Linea;
use App\Models\Codigo;
use Illuminate\Database\Seeder;

class MaestrosSeeder extends Seeder
{
    public function run(): void
    {
        Ejecutivo::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@impreforms.com',
            'activo' => true,
        ]);
        Ejecutivo::create([
            'nombre' => 'María García',
            'email' => 'maria.garcia@impreforms.com',
            'activo' => true,
        ]);
        Ejecutivo::create([
            'nombre' => 'Carlos López',
            'email' => 'carlos.lopez@impreforms.com',
            'activo' => true,
        ]);

        Director::create([
            'nombre' => 'Ana Martínez',
            'email' => 'ana.martinez@impreforms.com',
            'activo' => true,
        ]);
        Director::create([
            'nombre' => 'Roberto Sánchez',
            'email' => 'roberto.sanchez@impreforms.com',
            'activo' => true,
        ]);

        Linea::create(['linea' => 'Impresión Digital', 'codigo' => 'DIG-001', 'activo' => true]);
        Linea::create(['linea' => 'Impresión Offset', 'codigo' => 'OFF-001', 'activo' => true]);
        Linea::create(['linea' => 'Acabados', 'codigo' => 'ACB-001', 'activo' => true]);
        Linea::create(['linea' => 'Embalajes', 'codigo' => 'EMB-001', 'activo' => true]);
        Linea::create(['linea' => 'Serigrafía', 'codigo' => 'SER-001', 'activo' => true]);

        Codigo::create(['codigo_cliente' => 304, 'codigo' => 304, 'descripcion' => 'Cliente Corporativo A', 'activo' => true]);
        Codigo::create(['codigo_cliente' => 13665, 'codigo' => 13665, 'descripcion' => 'Cliente Minorista B', 'activo' => true]);
        Codigo::create(['codigo_cliente' => 1200, 'codigo' => 1200, 'descripcion' => 'Cliente Institucional C', 'activo' => true]);
        Codigo::create(['codigo_cliente' => 800, 'codigo' => 800, 'descripcion' => 'Cliente Especial D', 'activo' => true]);
    }
}