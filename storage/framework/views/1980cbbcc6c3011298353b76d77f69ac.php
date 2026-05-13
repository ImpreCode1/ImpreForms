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

    
    <div class="header">
        <h1>Tipo de Solicitud</h1>
    </div>


    <div class="info-section">
        <span class="info-label">Tipo de Solicitud</span>
        <div class="info-value"><?php echo e($formulario->tipo_solicitud); ?></div>
    </div>


    
    <div class="header">
        <h1>Información del Cliente</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Código del Cliente</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->codigo_cliente ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Nombre del Cliente</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->nombre ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Nombre del Representante Legal</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->nom_rep ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico del representante legal</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->correo ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Número de Celular</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->numero_celular ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">N° Oportunidad CRM</span>
        <div class="info-value"><?php echo e($formulario->infonegocio->n_oportunidad_crm ?? 'No especificado'); ?></div>
    </div>


    <br>
    <br>


    
    <div class="header">
        <h1>Orden de compra</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha</span>
        <div class="info-value"><?php echo e(\Carbon\Carbon::parse($formulario->fecha)->format('Y-m-d') ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">N° OC</span>
        <div class="info-value"><?php echo e($formulario->n_oc ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Incluye IVA?</span>
        <div class="info-value">
            <?php echo e($formulario->pago->isNotEmpty() && $formulario->pago->first()->incluye_iva ? 'Sí' : 'No'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Precio de venta que debe quedar en el contrato</span>
        <div class="info-value">$ <?php echo e($formulario->precio_venta ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Moneda</span>
        <div class="info-value"><?php echo e($formulario->moneda_precio_venta ?? 'No especificado'); ?></div>
    </div>

    <br>
    <br>

    
    <div class="header">
        <h1>Tipo de Solicitud</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de Solicitud</span>
        <div class="info-value"><?php echo e($formulario->tipo_contrato); ?></div>
    </div>

    <br>
    <br>



    
    <div class="header">
        <h1> Información del Equipo Comercial</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Linea</span>
        <div class="info-value"><?php echo e($formulario->linea ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Código de la línea</span>
        <div class="info-value"><?php echo e($formulario->codigo_linea ?? 'No especificado'); ?></div>
    </div>


    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value"><?php echo e($formulario->nombre ?? 'No especificado'); ?></div>
    </div>

    

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value"><?php echo e($formulario->correo_electronico ?? 'No especificado'); ?></div>
    </div>

    <div class="header">
        <h3 style="color: #005a8c">Información del Director</h3>
    </div>
    
    <div class="info-section">
        <span class="info-label">Director</span>
        <div class="info-value"><?php echo e($formulario->director ?? 'No especificado'); ?></div>
    </div>

    

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value"><?php echo e($formulario->correo_director ?? 'No especificado'); ?></div>
    </div>

    <br>
    <br>
    <div class="header">
        <h3 style="color: #005a8c">Información del Ejecutivo</h3>
    </div>
    
    

    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value"><?php echo e($formulario->nombre_ejc ?? 'No especificado'); ?></div>
    </div>

    

    <div class="info-section">
        <span class="info-label">Correo electronico</span>
        <div class="info-value"><?php echo e($formulario->email_ejc ?? 'No especificado'); ?></div>
    </div>

    <div class="header">
        <h3 style="color: #005a8c">Información adicional (si se requiere)</h3>
    </div>

    
    <div class="info-section">
        <span class="info-label">Nombre</span>
        <div class="info-value"><?php echo e($formulario->otro ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Telefono</span>
        <div class="info-value"><?php echo e($formulario->cel ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Correo electrónico</span>
        <div class="info-value"><?php echo e($formulario->email ?? 'No especificado'); ?></div>
    </div>


    
    <br>
    <br>

    <div class="header">
        <h1>Informacion de entrega</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Quién realiza la entrega a cliente?</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->realiza_entrega_cliente ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuántas entregas se van a realizar al cliente y en que fecha?</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->entrega_realizar ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Lugar de entrega y dirección</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->lugar_entrega ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Especificar país</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->pais ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Tiempo de entrega</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->tiempo_entrega ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha inicio término de entrega</span>
        <div class="info-value">
            <?php echo e(\Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio_termino)->format('Y-m-d') ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Tipo de incoterms</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->tipo_incoterms ?? 'No especificado'); ?></div>
    </div>

    <br>
    <br>

    
    <div class="header">
        <h1>Información del servicio</h1>
    </div>

    <div class="info-section">
        <span class="info-label">Servicio a prestar</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->servicio_a_prestar ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Frecuencia de suministro</span>
        <div class="info-value"><?php echo e($formulario->informacion->first()->frecuencia_suministro ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de inicio</span>
        <div class="info-value">
            <?php echo e(\Carbon\Carbon::parse($formulario->informacion->first()->fecha_inicio)->format('Y-m-d') ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de finalización</span>
        <div class="info-value">
            <?php echo e(\Carbon\Carbon::parse($formulario->informacion->first()->fecha_finalizacion)->format('Y-m-d') ?? 'No especificado'); ?>

        </div>
    </div>

    <br>
    <br>

    
    <div class="header">
        <h1>Garantias</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Aplica algún tipo de garantía?</span>
        
        <div class="info-value">
            <?php $__currentLoopData = $formulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($producto->aplica_garantia ?? 'No especificado'); ?>

                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuál es el termino de la garantía?</span>
        <div class="info-value">
            <?php $__currentLoopData = $formulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($producto->termino_garantia ?? 'No especificado'); ?>

                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>


    <br>
    <br>

    
    <div class="header">
        <h1>Polizas</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Aplica algún tipo de póliza?</span>
        
        <div class="info-value">
            <?php $__currentLoopData = $formulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($producto->aplica_poliza ?? 'No especificado'); ?>

                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Cuál es el porcentaje?</span>
        

        <div class="info-value">
            <?php $__currentLoopData = $formulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($producto->porcentaje_poliza ?? 'No especificado'); ?>%
                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>


    <br>
    <br>
    

    

    <div class="header">
        <h1>Información condiciones operaciones</h1>
    </div>

    <div class="info-section">
        <span class="info-label">¿Quien realiza la entrega a cliente?</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->entrega_cliente ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Lugar de entrega</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->lugar_entrega ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Especificar pais</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->pais ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Puerto</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->puerto ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Icoterm</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->incoterm ?? 'No especificado'); ?></div>
    </div>


    <div class="info-section">
        <span class="info-label">Transporte</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->transporte ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Origen</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->origen ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Destino</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->destino ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Condiciones de entrega local</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->condiciones ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Otros</span>
        <div class="info-value"><?php echo e($formulario->infoEntrega->first()->otros ?? 'No especificado'); ?></div>
    </div>




    
    

    <br>
    <br>


    

    
    <div class="header">
        <h1>Información condiciones financieras</h1>
    </div>


    <div class="info-section">
        <span class="info-label">Forma De Pago</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->forma_pago ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Plazo</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->plazo ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Moneda</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->moneda ?? 'No especificado'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">Garantías de Crédito</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->garantiascredit ?? 'No especificado'); ?></div>
    </div>

    

    <div class="info-section">
        <span class="info-label">¿Hay existencia de anticipo?</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->existencia_anticipo ? 'Sí' : 'No'); ?></div>
    </div>

    <div class="info-section">
        <span class="info-label">¿Qué porcentaje?</span>
        <div class="info-value">
            <?php echo e(number_format($formulario->financiera->first()->porcentaje ?? 0, 0) ?? 'No especificado'); ?>%</div>
    </div>

    <div class="info-section">
        <span class="info-label">Fecha de pago del anticipo</span>
        <div class="info-value">
            <?php echo e(\Carbon\Carbon::parse($formulario->financiera->first()->fecha_pago)->format('Y-m-d') ?? 'No especificado'); ?>

        </div>
    </div>

    <div class="info-section">
        <span class="info-label">Otros</span>
        <div class="info-value"><?php echo e($formulario->financiera->first()->otros ?? 'No especificado'); ?></div>
    </div>



    <div class="footer">
        Documento generado automáticamente | Impresistem S.A.S 2025 | <?php echo e(now()->format('d/m/Y')); ?>

    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\ImpreForms\resources\views/pdf/formulario.blade.php ENDPATH**/ ?>