<?php

namespace Database\Seeders;

use App\Models\AuditoriaObservacion;
use App\Models\Factura;
use App\Models\Seguimiento;
use App\Models\User;
use Illuminate\Database\Seeder;

class SeguimientoSeeder extends Seeder
{
    public function run(): void
    {
        if (!app()->isLocal()) {
            return;
        }

        $user = User::first();

        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
                'rol' => 'Admin',
            ]);
        }

        $seguimientos = [
            [
                'cliente' => 'Cliente ABC',
                'linea_primaria' => 'Impresión Digital',
                'fecha_apertura' => '2026-01-15',
                'fecha_cierre' => '2026-03-20',
                'fecha_facturacion' => '2026-04-01',
                'valor' => 15000.00,
                'estado_negocio' => 'Cerrado',
                'estado' => 'facturado',
                'incoterm' => 'FOB',
                'anticipos' => '50% anticipo',
                'tiempos_entrega' => '15 días',
                'forma_pago' => 'Contado',
                'facturacion' => 'Factura emitida',
                'actas_cierre' => 'Acta signed',
                'observaciones' => 'Proyecto completado exitosamente',
            ],
            [
                'cliente' => 'Cliente XYZ',
                'linea_primaria' => 'Serigrafía',
                'fecha_apertura' => '2026-02-01',
                'fecha_cierre' => null,
                'fecha_facturacion' => null,
                'valor' => 8500.00,
                'estado_negocio' => 'En negociación',
                'estado' => 'en_proceso',
                'incoterm' => 'CIF',
                'anticipos' => '30% anticipo',
                'tiempos_entrega' => '20 días',
                'forma_pago' => 'Crédito 30 días',
                'facturacion' => null,
                'actas_cierre' => null,
                'observaciones' => 'Pendiente validación de cliente',
            ],
            [
                'cliente' => 'Cliente 123',
                'linea_primaria' => 'Empaques',
                'fecha_apertura' => '2026-03-10',
                'fecha_cierre' => null,
                'fecha_facturacion' => null,
                'valor' => 22000.00,
                'estado_negocio' => 'Por cerrar',
                'estado' => 'pendiente',
                'incoterm' => 'EXW',
                'anticipos' => '40% anticipo',
                'tiempos_entrega' => '25 días',
                'forma_pago' => 'Transferencia',
                'facturacion' => null,
                'actas_cierre' => null,
                'observaciones' => 'Esperando aprobación de presupuesto',
            ],
        ];

        foreach ($seguimientos as $data) {
            $seguimiento = Seguimiento::create($data);

            Factura::create([
                'seguimiento_id' => $seguimiento->id,
                'numero_factura' => 'FAC-' . str_pad($seguimiento->id * 100, 6, '0', STR_PAD_LEFT),
                'fecha' => $seguimiento->fecha_facturacion ?? now()->subDays(rand(10, 30)),
                'valor' => $seguimiento->valor * 0.5,
                'descripcion' => 'Primera cuota',
                'acta_cierre' => null,
            ]);

            Factura::create([
                'seguimiento_id' => $seguimiento->id,
                'numero_factura' => 'FAC-' . str_pad($seguimiento->id * 100 + 1, 6, '0', STR_PAD_LEFT),
                'fecha' => $seguimiento->fecha_facturacion ? $seguimiento->fecha_facturacion->addDays(30) : now()->subDays(rand(1, 10)),
                'valor' => $seguimiento->valor * 0.5,
                'descripcion' => 'Segunda cuota',
                'acta_cierre' => $seguimiento->actas_cierre,
            ]);

            AuditoriaObservacion::create([
                'seguimiento_id' => $seguimiento->id,
                'user_id' => $user->id,
                'campo' => 'observaciones',
                'valor_anterior' => null,
                'valor_nuevo' => $seguimiento->observaciones,
                'created_at' => now()->subDays(rand(5, 15)),
            ]);
        }
    }
}