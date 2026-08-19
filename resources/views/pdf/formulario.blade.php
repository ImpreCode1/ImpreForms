<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Información</title>
    <style>
    @page {
        margin: 15mm 12mm;
    }

    body {
        font-family: 'Arial Narrow', sans-serif;
        font-stretch: condensed;
        color: #1d1d1d;
        margin: 0;
        font-size: 12px;
        line-height: 1.4;
    }

    .header {
        margin: 20px 0 10px;
        border-left: 4px solid #0a4977;
        padding-left: 10px;
    }

    .header h1,
    .header h3 {
        font-size: 15px;
        color: #0a4977;
        margin: 0;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-section {
        margin-bottom: 10px;
    }

    .info-label {
        font-size: 10px;
        text-transform: uppercase;
        font-weight: 600;
        color: #444;
        margin-bottom: 2px;
    }

    .info-value {
        font-size: 12px;
        font-weight: normal;
        border-bottom: 1px dashed #ccc;
        padding-bottom: 2px;
        padding-left: 1px;
    }

    .footer {
        margin-top: 25px;
        font-size: 9px;
        color: #777;
        text-align: center;
        border-top: 1px solid #ccc;
        padding-top: 8px;
    }
</style>

</head>

<body>

    {{-- tipo de solicitud --}}
    <div class="header">
        <h1>Tipo de Solicitud</h1>
    </div>


    <div class="info-section">
        <span class="info-label">Tipo de Solicitud</span>
        <div class="info-value">{{ $formulario->tipo_solicitud }}</div>
    </div>


    {{-- informacion --}}
    <div class="header">
        <h1>Información del Cliente</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Código del Cliente</span>
        <div class="info-value">{{ $formulario->infonegocio->codigo_cliente ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Nombre del Cliente</span>
        <div class="info-value">{{ $formulario->infonegocio->nombre ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Nombre del Representante Legal</span>
        <div class="info-value">{{ $formulario->infonegocio->nom_rep ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">NIT</span>
        <div class="info-value">{{ $formulario->infonegocio->nit ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Dirección (Cámara de Comercio)</span>
        <div class="info-value">{{ $formulario->infonegocio->direccion_domicilio ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Cédula del Representante Legal</span>
        <div class="info-value">{{ $formulario->infonegocio->cc_representante ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico del representante legal</span>
        <div class="info-value">{{ $formulario->infonegocio->correo ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Número de Celular</span>
        <div class="info-value">{{ $formulario->infonegocio->numero_celular ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">N° Oportunidad CRM</span>
        <div class="info-value">{{ $formulario->infonegocio->n_oportunidad_crm ?? 'No especificado' }}</div>
    </div>


    <br>
    <br>


    {{-- orden de compra --}}
    <div class="header">
        <h1>Orden de compra</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->fecha)->format('Y-m-d') ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">N° OC</span>
        <div class="info-value">{{ $formulario->n_oc ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Incluye IVA?</span>
        <div class="info-value">
            {{ $formulario->pago->isNotEmpty() && $formulario->pago->first()->incluye_iva ? 'Sí' : 'No' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Precio de venta que debe quedar en el contrato</span>
        <div class="info-value">$ {{ $formulario->precio_venta ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Moneda</span>
        <div class="info-value">{{ $formulario->moneda_precio_venta ?? 'No especificado' }}</div>
    </div>

    <br>
    <br>

    {{-- contrato --}}
    <div class="header">
        <h1>Tipo de Solicitud</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de Solicitud</span>
        <div class="info-value">{{ $formulario->tipo_contrato }}</div>
    </div>

    <br>
    <br>

    {{-- objeto del contrato --}}
    <br>
    <br>

    <div class="header">
        <h1>Objeto del Contrato</h1>
    </div>

    @if ($formulario->objetoContrato->isNotEmpty())
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px; font-size: 11px;">
            <thead>
                <tr style="background-color: #0a4977; color: #fff;">
                    <th style="padding: 6px 8px; text-align: left; border: 1px solid #ccc;">Descripción</th>
                    <th style="padding: 6px 8px; text-align: center; border: 1px solid #ccc; width: 60px;">Cantidad</th>
                    <th style="padding: 6px 8px; text-align: left; border: 1px solid #ccc; width: 100px;">Tipo</th>
                    <th style="padding: 6px 8px; text-align: right; border: 1px solid #ccc; width: 110px;">Precio Unitario</th>
                    <th style="padding: 6px 8px; text-align: right; border: 1px solid #ccc; width: 110px;">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formulario->objetoContrato as $item)
                    <tr>
                        <td style="padding: 5px 8px; border: 1px solid #ccc;">{{ $item->descripcion ?? 'No especificado' }}</td>
                        <td style="padding: 5px 8px; border: 1px solid #ccc; text-align: center;">{{ $item->cantidad ?? '—' }}</td>
                        <td style="padding: 5px 8px; border: 1px solid #ccc;">{{ $item->tipo ?? 'No especificado' }}</td>
                        <td style="padding: 5px 8px; border: 1px solid #ccc; text-align: right;">$ {{ number_format($item->precio_unitario ?? 0, 2) }}</td>
                        <td style="padding: 5px 8px; border: 1px solid #ccc; text-align: right;">$ {{ number_format($item->precio_total ?? 0, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #f0f4f8;">
                    <td colspan="4" style="padding: 6px 8px; border: 1px solid #ccc; text-align: right; font-weight: bold;">Total General</td>
                    <td style="padding: 6px 8px; border: 1px solid #ccc; text-align: right; font-weight: bold;">
                        $ {{ number_format($formulario->objetoContrato->sum('precio_total'), 2) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="info-section">
            <span class="info-label">Productos / Servicios</span>
            <div class="info-value">No especificado</div>
        </div>
    @endif

    <br>
    <br>

    {{-- gerente de producto --}}
    <div class="header">
        <h1> Información del Equipo Comercial</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Linea</span>
        <div class="info-value">{{ $formulario->linea ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Código de la línea</span>
        <div class="info-value">{{ $formulario->codigo_linea ?? 'No especificado' }}</div>
    </div>


    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value">{{ $formulario->nombre ?? 'No especificado' }}</div>
    </div>

    {{-- <div class="info-section">
        <span class="info-label">Teléfono</span>
        <div class="info-value">{{ $formulario->telefono ?? 'No especificado' }}</div>
    </div> --}}

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{ $formulario->correo_electronico ?? 'No especificado' }}</div>
    </div>

    <div class="header">
        <h3 style="color: #005a8c">Información del Director</h3>
    </div>
    {{-- informacion director --}}
    <div class="info-section">
        <span class="info-label">Director</span>
        <div class="info-value">{{ $formulario->director ?? 'No especificado' }}</div>
    </div>

    {{-- <div class="info-section">
        <span class="info-label">Teléfono</span>
        <div class="info-value">{{ $formulario->numero ?? 'No especificado' }}</div>
    </div> --}}

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{ $formulario->correo_director ?? 'No especificado' }}</div>
    </div>

    <br>
    <br>
    <div class="header">
        <h3 style="color: #005a8c">Información del Ejecutivo</h3>
    </div>
    {{-- informacion ejecutivo --}}
    {{-- <div class="info-section">
        <span class="info-label">Cod</span>
        <div class="info-value">{{ $formulario->cod_ejc ?? 'No especificado' }}</div>
    </div> --}}

    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value">{{ $formulario->nombre_ejc ?? 'No especificado' }}</div>
    </div>

    {{-- <div class="info-section">
        <span class="info-label">Teléfono</span>
        <div class="info-value">{{ $formulario->telefono_ejc ?? 'No especificado' }}</div>
    </div> --}}

    <div class="info-section">
        <span class="info-label">Correo electronico</span>
        <div class="info-value">{{ $formulario->email_ejc ?? 'No especificado' }}</div>
    </div>

    <div class="header">
        <h3 style="color: #005a8c">Información adicional (si se requiere)</h3>
    </div>

    {{-- información adicional (si se requiere) --}}
    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value">{{ $formulario->otro ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Telefono</span>
        <div class="info-value">{{ $formulario->cel ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{ $formulario->email ?? 'No especificado' }}</div>
    </div>


    {{-- informacion de entrega --}}
    <br>
    <br>

    <div class="header">
        <h1>Informacion de entrega</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Quién realiza la entrega a cliente?</span>
        <div class="info-value">{{ $formulario->informacion->first()->realiza_entrega_cliente ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuántas entregas se van a realizar al cliente y en que fecha?</span>
        <div class="info-value">{{ $formulario->informacion->first()->entrega_realizar ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Lugar de entrega y dirección</span>
        <div class="info-value">{{ $formulario->informacion->first()->lugar_entrega ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Especificar país</span>
        <div class="info-value">{{ $formulario->informacion->first()->pais ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Tiempo de entrega</span>
        <div class="info-value">
            @php
                $info = $formulario->informacion->first();
            @endphp
            @if($info && $info->tiempo_entrega_cantidad && $info->tiempo_entrega_unidad)
                {{ $info->tiempo_entrega_cantidad }} {{ $info->tiempo_entrega_unidad }}
            @elseif($info && $info->tiempo_entrega)
                {{ $info->tiempo_entrega }}
            @else
                No especificado
            @endif
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha inicio término de entrega</span>
        <div class="info-value">
            {{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio_termino)->format('Y-m-d') ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de incoterms</span>
        <div class="info-value">{{ $formulario->informacion->first()->tipo_incoterms ?? 'No especificado' }}</div>
    </div>

    <br>
    <br>

    {{-- info servicio --}}
    <div class="header">
        <h1>Información del servicio</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Servicio a prestar</span>
        <div class="info-value">{{ $formulario->informacion->first()->servicio_a_prestar ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Frecuencia de suministro</span>
        <div class="info-value">{{ $formulario->informacion->first()->frecuencia_suministro ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de inicio</span>
        <div class="info-value">
            {{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio)->format('Y-m-d') ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de finalización</span>
        <div class="info-value">
            {{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_finalizacion)->format('Y-m-d') ?? 'No especificado' }}
        </div>
    </div>

    <br>
    <br>

    {{-- polizas --}}
    <div class="header">
        <h1>Polizas</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Aplica algún tipo de póliza?</span>
        {{-- <div class="info-value">{{ $formulario->informacion->first()->aplica_poliza ?? 'No especificado' }}</div> --}}
        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->aplica_poliza ?? 'No especificado' }}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuál es el porcentaje?</span>
        {{-- <div class="info-value">{{ number_format($formulario->informacion->first()->porcentaje_poliza ?? 0, 0) ?? 'No especificado' }}%</div> --}}

        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->porcentaje_poliza ?? 'No especificado' }}%
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Aseguradora de la póliza</span>
        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->aseguradora_poliza ?? 'No especificado' }}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>


    <br>
    <br>
    {{-- <h4 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
        Información condiciones operaciones
    </h4> --}}

    {{-- logistica --}}

    <div class="header">
        <h1>Información condiciones operaciones</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Quien realiza la entrega a cliente?</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->entrega_cliente ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Lugar de entrega</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->lugar_entrega ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Especificar pais</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->pais ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Puerto</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->puerto ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Icoterm</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->incoterm ?? 'No especificado' }}</div>
    </div>


    <div class="info-section">
        <span class="info-label">Transporte</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->transporte ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Origen</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->origen ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Destino</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->destino ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Condiciones de entrega local</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->condiciones ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Otros</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->otros ?? 'No especificado' }}</div>
    </div>

<div class="footer">


    {{-- productos --}}
    {{-- <div class="header">
        <h1>Productos</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Anexar detalle de los equipos que se van a entregar</span>
        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->detalles_equipos ?? 'No especificado' }}
                    @if (!$loop->last), @endif
                @endforeach
            @endforeach
        </div>
    </div> --}}

    <br>
    <br>


    {{-- <h4 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
        Información condiciones financieras
    </h4> --}}
</div>

    {{-- condiciones  --}}
    <div class="header">
        <h1>Información condiciones financieras</h1>
    </div>


    <div class="info-section">
        <span class="info-label">Forma De Pago</span>
        <div class="info-value">{{ $formulario->financiera->first()->forma_pago ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Plazo</span>
        <div class="info-value">{{ $formulario->financiera->first()->plazo ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Moneda</span>
        <div class="info-value">{{ $formulario->financiera->first()->moneda ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Garantías de Crédito</span>
        <div class="info-value">{{ $formulario->financiera->first()->garantiascredit ?? 'No especificado' }}</div>
    </div>

    {{-- <div class="info-section">
        <span class="info-label">¿Incluye IVA?</span>
        <div class="info-value">{{ $formulario->financiera->first()->incluye_iva ? 'Sí' : 'No' }}</div>
    </div> --}}

    <div class="info-section">
        <span class="info-label">¿Hay existencia de anticipo?</span>
        <div class="info-value">{{ $formulario->financiera->first()->existencia_anticipo ? 'Sí' : 'No' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Qué porcentaje?</span>
        <div class="info-value">
            {{ number_format($formulario->financiera->first()->porcentaje ?? 0, 0) ?? 'No especificado' }}%</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de pago del anticipo</span>
        <div class="info-value">
            {{ \Carbon\Carbon::parse($formulario->financiera->first()->fecha_pago)->format('Y-m-d') ?? 'No especificado' }}
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Otros</span>
        <div class="info-value">{{ $formulario->financiera->first()->otros ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Facturación en</span>
        <div class="info-value">{{ $formulario->financiera->first()->facturacion_moneda ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">TRM</span>
        <div class="info-value">{{ $formulario->financiera->first()->trm ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Cuenta de compensación</span>
        <div class="info-value">{{ $formulario->financiera->first()->cuenta_compensacion ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Saldo restante (%)</span>
        <div class="info-value">{{ $formulario->financiera->first()->saldo_restante_porcentaje ?? 'No especificado' }}%</div>
    </div>

    <div class="info-section">
        <span class="info-label">Saldo restante valor</span>
        <div class="info-value">$ {{ $formulario->financiera->first()->saldo_restante_valor ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha pago saldo restante</span>
        <div class="info-value">{{ $formulario->financiera->first()->saldo_restante_fecha_pago ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Otras observaciones</span>
        <div class="info-value">{{ $formulario->financiera->first()->otras_observaciones ?? 'No especificado' }}</div>
    </div>


    {{-- correos internos --}}
    <br>
    <div class="header">
        <h1>Contactos Internos</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Correo Operaciones</span>
        <div class="info-value">operaciones@impresistem.com</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo Financiero</span>
        <div class="info-value">financiero@impresistem.com</div>
    </div>

    {{-- aprobación contrato --}}
    <br>
    <div class="header">
        <h1>Aprobación del Contrato</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Acceso a la plataforma</span>
        <div class="info-value">
            Ingrese a la plataforma en <strong>contratos.impresistem.com</strong> y busque por el N° de oportunidad CRM <strong>{{ $formulario->infonegocio->n_oportunidad_crm ?? 'No especificado' }}</strong> para aprobar, rechazar o consultar el historial de esta solicitud.
        </div>
    </div>


    <div class="footer">
        Documento generado automáticamente | Impresistem S.A.S 2025 | {{ now()->format('d/m/Y') }}
    </div>
</body>

</html>
