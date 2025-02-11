<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Información</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 20px;
    font-size: 14px;
    background-color: #f9f9f9;
}

.header {
    text-align: center;
    border-bottom: 3px solid #005a8c;
    padding-bottom: 10px;
    margin-bottom: 25px;
}

.header h1 {
    color: #005a8c;
    margin: 0;
    font-size: 18px;
    font-weight: bold;
}

.info-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.info-section {
    background: #fff;
    padding: 12px;
    border-radius: 6px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    flex: 1 1 calc(50% - 15px);
    min-width: 250px;
}

.info-label {
    color: #005a8c;
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    text-transform: uppercase;
    font-size: 11px;
}

.info-value {
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 5px;
    font-size: 13px;
    font-weight: bold;
    color: #333;
}

.footer {
    text-align: center;
    font-size: 10px;
    color: #666;
    margin-top: 25px;
    padding-top: 10px;
    border-top: 2px solid #ccc;
}

    </style>
</head>
<body>
    <div class="header">
        <h1>Información del Cliente</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Código del Cliente</span>
        <div class="info-value">{{ $formulario->infonegocio->codigo_cliente }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Nombre del Cliente</span>
        <div class="info-value">{{ $formulario->infonegocio->nombre }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo Electrónico</span>
        <div class="info-value">{{ $formulario->infonegocio->correo }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Número de Celular</span>
        <div class="info-value">{{ $formulario->infonegocio->numero_celular }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">N° Oportunidad CRM</span>
        <div class="info-value">{{ $formulario->infonegocio->n_oportunidad_crm }}</div>
    </div>

    <br>
    <br>

    {{-- contrato --}}
    <div class="header">
        <h1>Tipo de contrato</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de Contrato</span>
        <div class="info-value">{{ $formulario->tipo_contrato }}</div>
    </div>

    <br>
    <br>

    <div class="header">
        <h1>Gerente de producto</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Linea</span>
        <div class="info-value">{{$formulario->linea ?? 'No especificado'}}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Código de la línea</span>
        <div class="info-value">{{ $formulario->codigo_linea ?? 'No especificado' }}</div>
    </div>


    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value">{{ $formulario->nombre ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Teléfono</span>
        <div class="info-value">{{ $formulario->telefono ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{ $formulario->correo_electronico ?? 'No especificado' }}</div>
    </div>


    <div class="header">
        <h3 style="color: #005a8c">Información adiccional (si se requiere)</h3>
    </div>

    {{-- información adiccional (si se requiere) --}}
    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value">{{$formulario->otro ?? 'No especificado'}}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Telefono</span>
        <div class="info-value">{{$formulario->cel ?? 'No especificado'}}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{$formulario->email ?? 'No especificado'}}</div>
    </div>


    <div class="header">
        <h3 style="color: #005a8c">Información del Director</h3>
    </div>
    {{-- informacion director --}}
    <div class="info-section">
        <span class="info-label">Director</span>
        <div class="info-value">{{ $formulario->director ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Teléfono</span>
        <div class="info-value">{{ $formulario->numero ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value">{{ $formulario->correo_director ?? 'No especificado' }}</div>
    </div>


    {{-- Orden de compra --}}
    <br>
    <br>

    <div class="header">
        <h1>Orden de compra</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->fecha)->format('Y-m-d') ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">N° OC</span>
        <div class="info-value">{{ $formulario->n_oc ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Precio de venta</span>
        <div class="info-value">{{ $formulario->precio_venta ?? 'No especificado' }}</div>
    </div>


     {{-- informacion de entrega --}}


     <br>
     <br>

     <div class="header">
         <h1>Informacion de entrega</h1>
     </div>

     <div class="info-section">
        <span class="info-label">¿Quién realiza la entrega a cliente?</span>
        <div class="info-value">{{ $formulario->informacion->first()->realiza_entrega_cliente ?? 'No especificado' }}</div>
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
        <div class="info-value">{{ $formulario->informacion->first()->tiempo_entrega ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha inicio término de entrega</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio_termino)->format('Y-m-d') ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de incoterms</span>
        <div class="info-value">{{ $formulario->informacion->first()->tipo_incoterms ?? 'No especificado' }}</div>
    </div>


    {{-- logistica --}}
    <br>
    <br>

    <div class="header">
        <h1>Logistica</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Icoterm</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->incoterm ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Puerto</span>
        <div class="info-value">{{ $formulario->infoEntrega->first()->puerto ?? 'No especificado' }}</div>
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
        <div class="info-value">{{ $formulario->informacion->first()->frecuencia_suministro ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de inicio</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio)->format('Y-m-d') ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de finalización</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->informacion->first()->fecha_finalizacion)->format('Y-m-d') ?? 'No especificado' }}</div>
    </div>


    <br>
    <br>

    {{-- productos --}}
    <div class="header">
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
    </div>

    <br>
    <br>

    {{-- garantia --}}
    <div class="header">
        <h1>Garantias</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Aplica algún tipo de garantía?</span>
        {{-- <div class="info-value">{{ $formulario->informacion->first()->aplica_garantia ?? 'No especificado' }}</div> --}}
        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->aplica_garantia ?? 'No especificado' }}
                    @if (!$loop->last), @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuál es el termino de la garantía?</span>
         <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ $producto->termino_garantia ?? 'No especificado' }}
                    @if (!$loop->last), @endif
                @endforeach
            @endforeach
        </div>

    </div>


    <br>
    <br>

    {{-- condiciones  --}}
    <div class="header">
        <h1>Condiciones Pago</h1>
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

    <div class="info-section">
        <span class="info-label">¿Incluye IVA?</span>
        <div class="info-value">{{ $formulario->financiera->first()->incluye_iva ? 'Sí' : 'No' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Hay existencia de anticipo?</span>
        <div class="info-value">{{ $formulario->financiera->first()->existencia_anticipo ? 'Sí' : 'No' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Qué porcentaje?</span>
        <div class="info-value">{{ number_format($formulario->financiera->first()->porcentaje ?? 0, 0) ?? 'No especificado' }}%</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de pago del anticipo</span>
        <div class="info-value">{{ \Carbon\Carbon::parse($formulario->financiera->first()->fecha_pago)->format('Y-m-d') ?? 'No especificado' }}</div>
    </div>

    <div class="info-section">
        <span class="info-label">Otros</span>
        <div class="info-value">{{ $formulario->financiera->first()->otros ?? 'No especificado' }}</div>
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
                    @if (!$loop->last), @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuál es el porcentaje?</span>
        {{-- <div class="info-value">{{ number_format($formulario->informacion->first()->porcentaje_poliza ?? 0, 0) ?? 'No especificado' }}%</div>--}}

        <div class="info-value">
            @foreach ($formulario->informacion as $informacion)
                @foreach ($informacion->producto as $producto)
                    {{ number_format($producto->porcentaje_poliza ?? 0,0 ) ?? 'No especificado' }}%
                    @if (!$loop->last), @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="footer">
        Documento generado automáticamente | Impresistem S.A.S 2025 | {{ now()->format('d/m/Y') }}
    </div>
</body>
</html>
