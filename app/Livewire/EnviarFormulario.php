<?php

namespace App\Livewire;

use App\Livewire\Traits\InvertirNombre;
use App\Models\Codigo;
use App\Models\Colaborador;
use App\Models\Director;
use App\Models\Documento;
use App\Models\Executive;
use App\Models\Financiera;
use App\Models\Infonegocio;
use App\Models\Informacion;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\Pago;
use App\Models\Producto;
use App\Models\ObjetoContrato;
use App\Models\Seguimiento;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnviarFormulario extends Component
{
    use WithFileUploads, InvertirNombre;
    public $currentStep = 1;

    // identificadores de archivos por id

    public $marcasId;
    public $documento;
    public $documentos;
    // fin de manejo de documentos
    public $hasAdvancePayment;
    public $advancePaymentPercentage;
    public $advancePaymentDate;
    public $negocio;
    public $nombre;
    public $correo;
    public $numero;
    public $crm;
    // public $fecha;
    // public $oc;
    public $precio;
    // public $cotizacion;
    public $soluciones = '';
    public $linea;
    public $linea_especifica;
    public $codlinea = '';
    public $nombreLinea = '';
    public $nomgerente;
    // public $telgerente;
    public $corgerente;
    public $director;
    // public $tel2gerente;
    public $entregacliente;
    public $lugarentrega;
    public $espais;
    public $tiempoentrega;
    public $tiempo_entrega_cantidad;
    public $tiempo_entrega_unidad;
    public $terminoentrega;
    public $tipoicoterm;
    public $prestar;
    public $suministrar;
    public $inicio;
    public $finalizacion;
    public $nom_rep;
    public $nit;
    public $direccion_domicilio;
    public $cc_representante;
    // public $details;
    public $aplicagarantia = '';
    public $terminogarantia;

    // public $formapago;
    // public $moneda;
    public $incluye_iva = '';

    public $clientcode;
    public $clientname;
    public $mail;
    public $otros;
    public $orden_compra;

    public $other;
    public $actualpago;
    public $monedaactual;
    public $facturacion_moneda;
    public $trm;
    public $cuenta_compensacion;
    public $saldo_restante_porcentaje;
    public $saldo_restante_valor;
    public $saldo_restante_fecha_pago;
    public $otras_observaciones;
    public $aseguradora_poliza;
    public $porcentaje;
    public $aplicapoliza = '';
    public $fecha_pago;

    public $tipodocumento;
    public $rutadocumento;
    public $fechasubida;
    public $existingFiles;
    public $attachments = [];

    public $marca_id;
    public $archivos = [];
    public $documentosGuardados = [];
    public $archivosNuevos = [];
    public $objetoContrato = [];

    public $selectedDirector;
    public $DirectorEmail = '';

    // public $cod_ejc;
    public $nombre_ejc;
    public $nombre_dir;
    // public $telefono_ejc;
    public $email_ejc;
    public $tipo_solicitud = '';

    public $operacionesLink;
    public $financieraLink;
    public $marcaId;
    public $cod;
    public $files = [];
    public $dragging = false;
    public $cantidad_entregas;
    public $fecha_entrega;
    public $mmd = false;
    public $Lineas;
    public $selectedEjecutivo;
    public $EjecutivoEmail = '';
    public $EjecutivoName = '';
    public $DirectorName = '';
    public $selectedCodigo;
    public $forma_pago;
    public $fecha_cada_pago;
    public $moneda = '';
    public $incluir_iva = false;
    public $hay_anticipo = false;
    public $porcentaje_anticipo = 0;
    public $fecha_pago_anticipo;
    public $otros_pago;
    public $moneda_precio_venta = '';
    public $correo_administrador;
    protected $listeners = ['openModal'];
    protected $rules = [
        'files' => 'required|array|min:1',
        'files.*.file' => 'required|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg,msg,eml',

        // * Infonegocio
        'tipo_solicitud' => 'required',
        'negocio' => 'required|string|regex:/^[\d,\.]+$/',
        'nombre' => 'required|string|min:5',
        'correo' => 'required|email',
        'numero' => 'required|numeric',
        'crm' => 'required|numeric|unique:infonegocio,n_oportunidad_crm',

        // * Marca
        'precio' => 'required|string|regex:/^[\d,\.]+$/',
        'soluciones' => 'required|string|min:5',
        'linea_especifica' => 'nullable|string|in:EBG,Solar,Daas,HPE',
        'codlinea' => 'required|string',
        'nomgerente' => 'required|string|min:5',
        'nom_rep' => 'required|string',
        'nit' => 'nullable|string',
        'direccion_domicilio' => 'nullable|string',
        'cc_representante' => 'nullable|string',
        'corgerente' => 'required|email',
        'DirectorName' => 'required|string|min:5',
        'forma_pago' => 'nullable|string',
        'fecha_cada_pago' => 'nullable|string',
        'moneda' => 'nullable|string',
        'moneda_precio_venta' => 'required|string',
        'incluir_iva' => 'boolean',
        'hay_anticipo' => 'boolean',
        'porcentaje_anticipo' => 'nullable|numeric|min:0',
        'fecha_pago_anticipo' => 'nullable|date',
        'otros_pago' => 'nullable|string',

        // Opcionales en Marca
        'clientcode' => 'nullable|string',
        'clientname' => 'nullable|numeric',
        'mail' => 'nullable|email',
        'EjecutivoEmail' => 'nullable|email',
        'DirectorEmail' => 'nullable|email',
        'orden_compra' => 'nullable|string|min:1',

        // * Información
        'entregacliente' => 'required|string|min:5',
        'cantidad_entregas' => 'nullable|integer|min:1',
        'fecha_entrega' => 'nullable|date',
        'lugarentrega' => 'required|string|min:5',
        'espais' => 'required|string|min:5',
        'tiempoentrega' => 'nullable|string',
        'tiempo_entrega_cantidad' => 'nullable|integer|min:1',
        'tiempo_entrega_unidad' => 'nullable|string|in:Días,Semanas,Meses,Años',
        'terminoentrega' => 'required|date',
        'tipoicoterm' => 'required|string|min:2',
        'prestar' => 'nullable|string|min:1',
        'suministrar' => 'nullable|string|min:1',
        'inicio' => 'nullable|date',
        'finalizacion' => 'nullable|date|after_or_equal:inicio',

        // * Producto
        'aplicagarantia' => 'nullable|in:Fábrica,Impresistem',
        'terminogarantia' => 'nullable|string|min:1',
        'aplicapoliza' => 'required|in:si,no',
        'porcentaje' => 'nullable|numeric|min:0|max:100',
        'aseguradora_poliza' => 'nullable|string|max:255',
        'facturacion_moneda' => 'nullable|in:COP,USD',
        'trm' => 'nullable|in:Pactada,TRM del día de factura',
        'cuenta_compensacion' => 'nullable|in:Sí,No',
        'saldo_restante_porcentaje' => 'nullable|numeric|min:0|max:100',
        'saldo_restante_valor' => 'nullable|numeric|min:0',
        'saldo_restante_fecha_pago' => 'nullable|date',
        'otras_observaciones' => 'nullable|string|max:500',
        'incluye_iva' => 'boolean|required|in:0,1',

        // * Objeto del Contrato
        'objetoContrato' => 'nullable|array',
        'objetoContrato.*.descripcion' => 'required_with:objetoContrato.*.cantidad|string|max:500',
        'objetoContrato.*.cantidad' => 'required_with:objetoContrato.*.descripcion|integer|min:1',
        'objetoContrato.*.tipo' => 'nullable|string|in:Hardware,Licencia,HiCare,Servicio',
        'objetoContrato.*.precio_unitario' => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        // Generales
        'required' => 'Este campo es obligatorio.',
        'string' => 'Este campo debe ser texto.',
        'numeric' => 'Este campo debe contener solo números.',
        'email' => 'Debe ingresar un correo válido.',
        'date' => 'Debe ingresar una fecha válida.',
        'min' => 'Este campo debe tener al menos :min caracteres.',
        'max' => 'Este campo no puede ser mayor que :max.',
        'in' => 'El valor seleccionado no es válido.',
        'required_if' => 'Este campo es obligatorio cuando se selecciona ":other".',
        'array' => 'Debe subir al menos un archivo.',
        'boolean' => 'El valor debe ser verdadero o falso.',

        // Campos específicos
        'negocio.required' => 'El código del cliente es obligatorio.',
        'negocio.numeric' => 'El código del cliente debe ser numérico.',
        'negocio.min' => 'El código del cliente debe tener al menos :min dígitos.',

        'nombre.required' => 'El nombre del cliente es obligatorio.',
        'correo.required' => 'El correo del cliente es obligatorio.',
        'numero.required' => 'El número del cliente es obligatorio.',
        'crm.required' => 'El número CRM es obligatorio.',
        'crm.unique' => 'El número CRM ya está registrado.',

        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser numérico.',
        'precio.min' => 'El precio debe ser mayor a 0.',

        'incluye_iva.boolean' => 'Debe especificar si incluye IVA.',
        'incluye_iva.required' => 'Debe seleccionar si incluye IVA.',

        'hay_anticipo.boolean' => 'Debe indicar si hay anticipo.',
        'porcentaje_anticipo.required_if' => 'Debe especificar el porcentaje de anticipo.',
        'porcentaje_anticipo.numeric' => 'El porcentaje de anticipo debe ser numérico.',
        'porcentaje_anticipo.min' => 'El porcentaje de anticipo no puede ser menor que 0.',
        'porcentaje_anticipo.max' => 'El porcentaje de anticipo no puede ser mayor que 100.',
        'fecha_pago_anticipo.required_if' => 'Debe especificar la fecha de pago del anticipo.',

        'terminogarantia.required_if' => 'Debe especificar el término de la garantía.',
        'porcentaje.required_if' => 'Debe especificar el porcentaje de póliza.',
        'porcentaje.numeric' => 'El porcentaje debe ser numérico.',
        'porcentaje.min' => 'El porcentaje no puede ser menor que 0.',
        'porcentaje.max' => 'El porcentaje no puede ser mayor que 100.',

        // Mensajes checkboxes
        'incluir_iva.boolean' => 'El campo "Incluye IVA" debe ser verdadero o falso.',
        // 'hay_anticipo.boolean' => 'El campo "Hay anticipo" debe ser verdadero o falso.',

        // Campos de anticipo
        // 'porcentaje_anticipo.numeric' => 'El porcentaje de anticipo debe ser un número y no puede ser menor a 0.',
        // 'porcentaje_anticipo.min' => 'El porcentaje de anticipo no puede ser menor a 0.',
        'fecha_pago_anticipo.date' => 'La fecha del anticipo debe ser una fecha válida.',
        // 'incluir_iva.boolean' => 'El campo "Incluir IVA" debe ser verdadero o falso.',

        // Otros
        'otros_pago.string' => 'El campo "Otros" debe contener texto.',

        'files.required' => 'Debe adjuntar al menos un documento.',
        'files.array' => 'Los documentos deben estar en formato válido.',

        'finalizacion.after_or_equal' => 'La fecha de finalización no puede ser menor a la fecha de inicio.',
        'selectedDirector' => 'nullable|string',
        'selectedEjecutivo' => 'nullable|string',

        // Objeto del Contrato
        'objetoContrato.*.descripcion.required_with' => 'La descripción del producto es obligatoria cuando se especifica una cantidad.',
        'objetoContrato.*.descripcion.string' => 'La descripción debe ser texto.',
        'objetoContrato.*.descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
        'objetoContrato.*.cantidad.required_with' => 'La cantidad es obligatoria cuando se especifica una descripción.',
        'objetoContrato.*.cantidad.integer' => 'La cantidad debe ser un número entero.',
        'objetoContrato.*.cantidad.min' => 'La cantidad mínima es 1.',
        'objetoContrato.*.tipo.in' => 'El tipo seleccionado no es válido.',
        'objetoContrato.*.precio_unitario.numeric' => 'El precio unitario debe ser un número.',
        'objetoContrato.*.precio_unitario.min' => 'El precio unitario no puede ser negativo.',
    ];

    // * mostrar garantia
    public function updated($propertyName)
    {
        if (array_key_exists($propertyName, $this->rules ?? [])) {
            $this->validateOnly($propertyName);
        }
    }

    public function updatedHasAdvancePayment($value)
    {
        if ($value === 'si') {
            $this->rules['actualpago'] = 'required|date';
            $this->rules['monedaactual'] = 'required|string|min:3';
        } else {
            unset($this->rules['actualpago']);
            unset($this->rules['monedaactual']);
        }
    }

    public function changeStep($step)
    {
        $this->resetValidation();
        $this->currentStep = $step;
    }

    // public function eliminarArchivo()
    // {
    //     // Verifica si hay un archivo cargado y lo elimina
    //     if ($this->cotizacion) {
    //         $this->cotizacion = null;
    //     }
    // }

    public function removeFile($fileId)
    {
        if (isset($this->files[$fileId])) {
            unset($this->files[$fileId]);
            $this->files = array_filter($this->files);
        }
    }

    public function setAdvancePayment($value)
    {
        $this->hasAdvancePayment = $value;

        if ($value === 'no') {
            $this->advancePaymentPercentage = null;
            $this->advancePaymentDate = null;
        }
    }

    public function agregarFila()
    {
        $this->objetoContrato[] = [
            'descripcion' => '',
            'cantidad' => 1,
            'tipo' => '',
            'precio_unitario' => 0,
            'precio_total' => 0,
        ];
    }

    public function eliminarFila($index)
    {
        unset($this->objetoContrato[$index]);
        $this->objetoContrato = array_values($this->objetoContrato);
    }

    public function updatedObjetoContrato($value, $key)
    {
        $parts = explode('.', $key);
        if (count($parts) === 2) {
            $index = $parts[0];
            $field = $parts[1];
            if (in_array($field, ['cantidad', 'precio_unitario']) && isset($this->objetoContrato[$index])) {
                $cantidad = (float) ($this->objetoContrato[$index]['cantidad'] ?? 0);
                $precioUnitario = (float) ($this->objetoContrato[$index]['precio_unitario'] ?? 0);
                $this->objetoContrato[$index]['precio_total'] = round($cantidad * $precioUnitario, 2);
            }
        }
    }

    public function submit()
    {
        try {
            // ✅ Validaciones
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $etiquetas = [
                'files'                => 'Documentos adjuntos',
                'tipo_solicitud'       => 'Tipo de solicitud',
                'negocio'              => 'Código del cliente',
                'nombre'               => 'Nombre del cliente',
                'correo'               => 'Correo del representante legal',
                'numero'               => 'Número celular',
                'crm'                  => 'N° oportunidad CRM',
                'precio'               => 'Precio de venta',
                'soluciones'           => 'Soluciones',
                'linea_especifica'     => 'Línea específica',
                'codlinea'             => 'Código de línea',
                'nomgerente'           => 'Nombre del gerente de producto',
                'nom_rep'              => 'Nombre del representante legal',
                'nit'                  => 'NIT',
                'direccion_domicilio'  => 'Dirección de domicilio',
                'cc_representante'     => 'Cédula del representante legal',
                'corgerente'           => 'Correo del gerente',
                'DirectorName'         => 'Nombre del director',
                'moneda_precio_venta'  => 'Moneda del precio de venta',
                'forma_pago'           => 'Forma de pago',
                'fecha_cada_pago'      => 'Plazos de pago',
                'moneda'               => 'Moneda (pago)',
                'incluir_iva'          => 'Incluye IVA',
                'hay_anticipo'         => 'Hay anticipo',
                'porcentaje_anticipo'  => 'Porcentaje de anticipo',
                'fecha_pago_anticipo'  => 'Fecha de pago anticipo',
                'otros_pago'           => 'Otros (pago)',
                'clientcode'           => 'Otro',
                'clientname'           => 'Teléfono',
                'mail'                 => 'Correo adicional',
                'EjecutivoEmail'       => 'Correo del ejecutivo',
                'DirectorEmail'        => 'Correo del director',
                'orden_compra'         => 'Orden de compra',
                'entregacliente'       => '¿Quién realiza la entrega?',
                'cantidad_entregas'    => 'Cantidad de entregas',
                'fecha_entrega'        => 'Fecha de entrega',
                'lugarentrega'         => 'Lugar de entrega',
                'espais'               => 'País',
                'tiempo_entrega_cantidad' => 'Tiempo de entrega (cantidad)',
                'tiempo_entrega_unidad'   => 'Tiempo de entrega (unidad)',
                'terminoentrega'       => 'Fecha término de entrega',
                'tipoicoterm'          => 'Tipo de incoterms',
                'prestar'              => 'Servicio a prestar',
                'suministrar'          => 'Frecuencia de suministro',
                'inicio'               => 'Fecha de inicio',
                'finalizacion'         => 'Fecha de finalización',
                'aplicagarantia'       => '¿Aplica garantía?',
                'terminogarantia'      => 'Término de garantía',
                'aplicapoliza'         => '¿Aplica póliza?',
                'porcentaje'           => 'Porcentaje de póliza',
                'aseguradora_poliza'   => 'Aseguradora de la póliza',
                'facturacion_moneda'   => 'Moneda de facturación',
                'trm'                  => 'TRM',
                'cuenta_compensacion'  => 'Cuenta de compensación',
                'saldo_restante_porcentaje' => 'Saldo restante (%)',
                'saldo_restante_valor'      => 'Saldo restante valor',
                'saldo_restante_fecha_pago' => 'Fecha de pago saldo restante',
                'otras_observaciones'  => 'Otras observaciones',
                'incluye_iva'          => '¿Incluye IVA?',
            ];

            $mensajes = [];
            foreach ($e->errors() as $campo => $errores) {
                $etiqueta = $etiquetas[$campo] ?? $campo;
                foreach ($errores as $error) {
                    $mensajes[] = "<b>{$etiqueta}:</b> {$error}";
                }
            }

            $mensaje = implode('<br>', $mensajes);

            $this->dispatch('validation-error', message: $mensaje);

            throw $e; // Livewire seguirá mostrando los errores en @error
        }

        DB::beginTransaction();

        try {
            // ✅ Crear Infonegocio
            $infonegocio = Infonegocio::create([
                'codigo_cliente' => $this->negocio,
                'nombre' => $this->nombre,
                'correo' => $this->correo,
                'numero_celular' => $this->numero,
                'n_oportunidad_crm' => $this->crm,
                'nom_rep' => $this->nom_rep,
                'nit' => $this->nit,
                'direccion_domicilio' => $this->direccion_domicilio,
                'cc_representante' => $this->cc_representante,
            ]);

            $this->precio = str_replace('.', ',', $this->precio);

            // ✅ Crear Marca
            $marca = Marca::create([
                'infonegocio_id' => $infonegocio->id,
                'user_id' => auth()->id(),
                'fecha' => now(),
                'precio_venta' => $this->precio,
                'tipo_contrato' => $this->soluciones,
                'linea' => $this->linea,
                'codigo_linea' => $this->codlinea,
                'nombre' => $this->nomgerente,
                'correo_electronico' => $this->corgerente,
                'otros_pago' => $this->otros_pago,
                'cel' => $this->clientname,
                'email' => $this->mail,
                'director' => $this->DirectorName,
                'correo_director' => $this->DirectorEmail,
                'nombre_ejc' => $this->EjecutivoName,
                'email_ejc' => $this->EjecutivoEmail,
                'tipo_solicitud' => $this->tipo_solicitud,
                'moneda_precio_venta' => $this->moneda_precio_venta,
                'forma_pago' => $this->forma_pago,
                'fecha_cada_pago' => $this->fecha_cada_pago,
                'moneda' => $this->moneda ?: null,
                'incluir_iva' => $this->incluir_iva ?? 0,
                'hay_anticipo' => $this->hay_anticipo ?? 0,
                'porcentaje_anticipo' => $this->porcentaje_anticipo,
                'fecha_pago_anticipo' => $this->fecha_pago_anticipo ?: null,
                'otro' => $this->clientcode,
                'orden_compra' => $this->orden_compra,
            ]);

            $this->marcaId = $marca->id;

            // ✅ Crear Información
            $informacion = Informacion::create([
                'marcas_id' => $this->marcaId,
                'realiza_entrega_cliente' => $this->entregacliente,
                'cantidad_entregas' => $this->cantidad_entregas,
                'fecha_entrega' => $this->fecha_entrega,
                'lugar_entrega' => $this->lugarentrega,
                'pais' => $this->espais,
                'tiempo_entrega' => $this->tiempoentrega,
                'tiempo_entrega_cantidad' => $this->tiempo_entrega_cantidad,
                'tiempo_entrega_unidad' => $this->tiempo_entrega_unidad,
                'fecha_inicio_termino' => $this->terminoentrega,
                'tipo_incoterms' => $this->tipoicoterm,
                'servicio_a_prestar' => $this->prestar,
                'frecuencia_suministro' => $this->suministrar,
                'fecha_inicio' => $this->inicio,
                'fecha_finalizacion' => $this->finalizacion,
                'linea_especifica' => $this->linea_especifica,
            ]);

            // ✅ Crear Producto
            Producto::create([
                'informacion_id' => $informacion->id,
                'aplica_garantia' => $this->aplicagarantia,
                'termino_garantia' => $this->terminogarantia,
                'aplica_poliza' => $this->aplicapoliza,
                'porcentaje_poliza' => $this->porcentaje,
                'aseguradora_poliza' => $this->aseguradora_poliza,
            ]);

            // ✅ Crear Objeto del Contrato
            foreach ($this->objetoContrato as $item) {
                if (!empty($item['descripcion']) && !empty($item['cantidad'])) {
                    ObjetoContrato::create([
                        'marca_id' => $this->marcaId,
                        'descripcion' => $item['descripcion'],
                        'cantidad' => $item['cantidad'],
                        'tipo' => $item['tipo'],
                        'precio_unitario' => $item['precio_unitario'],
                        'precio_total' => $item['precio_total'],
                    ]);
                }
            }

            // ✅ Crear Pago
            Pago::create([
                'marcas_id' => $this->marcaId,
                'incluye_iva' => $this->incluye_iva ?? 0,
            ]);

            // ✅ Crear Financiera
            Financiera::create([
                'marcas_id' => $this->marcaId,
                'otros' => $this->otros,
                'facturacion_moneda' => $this->facturacion_moneda,
                'trm' => $this->trm,
                'cuenta_compensacion' => $this->cuenta_compensacion,
                'saldo_restante_porcentaje' => $this->saldo_restante_porcentaje,
                'saldo_restante_valor' => $this->saldo_restante_valor,
                'saldo_restante_fecha_pago' => $this->saldo_restante_fecha_pago,
                'otras_observaciones' => $this->otras_observaciones,
            ]);

            // ✅ Crear links únicos
            $this->operacionesLink = (string) Str::uuid();
            $this->financieraLink = (string) Str::uuid();

            $expirationTime = Carbon::now();

            DB::table('form_links')->insert([
                [
                    'link' => $this->operacionesLink,
                    'type' => 'operaciones',
                    'marca_id' => $marca->id,
                    'cliente' => $this->negocio,
                    'nombre' => $this->nombre,
                    'crm' => $this->crm,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'expires_at' => $expirationTime,
                ],
                [
                    'link' => $this->financieraLink,
                    'type' => 'financiera',
                    'marca_id' => $marca->id,
                    'cliente' => $this->negocio,
                    'nombre' => $this->nombre,
                    'crm' => $this->crm,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'expires_at' => $expirationTime,
                ],
            ]);

            // ✅ Subir archivos
            if (!empty($this->files)) {
                foreach ($this->files as $file) {
                    if (!isset($file['file']) || !isset($file['name'])) {
                        continue;
                    }

                    $safeName = Str::limit($file['name'], 255, '');
                    $storedPath = $file['file']->store('documents', 'public');

                    Documento::create([
                        'marcas_id' => $this->marcaId,
                        'nombre_original' => $safeName,
                        'ruta_documento' => $storedPath,
                    ]);
                }
            }

            // ✅ Crear / actualizar Seguimiento (después de que todos los datos existen)
            $anticiposText = null;
            if ($this->hay_anticipo) {
                $parts = [];
                if ($this->porcentaje_anticipo) {
                    $parts[] = $this->porcentaje_anticipo . '%';
                }
                if ($this->fecha_pago_anticipo) {
                    $parts[] = 'Fecha: ' . \Carbon\Carbon::parse($this->fecha_pago_anticipo)->format('d/m/Y');
                }
                if ($this->otros_pago) {
                    $parts[] = $this->otros_pago;
                }
                $anticiposText = !empty($parts) ? implode(' - ', $parts) : 'Sí';
            }

            $tiempos = '';
            if ($this->tiempo_entrega_cantidad || $this->tiempo_entrega_unidad) {
                $tiempos = trim(($this->tiempo_entrega_cantidad ?? '') . ' ' . ($this->tiempo_entrega_unidad ?? ''));
            }

            Seguimiento::updateOrCreate(
                ['marca_id' => $marca->id],
                [
                    'numero_oportunidad' => $this->crm,
                    'cliente'            => $infonegocio->nombre,
                    'linea_primaria'     => $marca->linea,
                    'valor'              => self::parseValor($this->precio),
                    'fecha_apertura'     => now()->toDateString(),
                    'incoterm'           => $this->tipoicoterm,
                    'anticipos'          => $anticiposText,
                    'tiempos_entrega'    => $tiempos ?: null,
                    'forma_pago'         => $this->forma_pago,
                    'fecha_facturacion'  => $this->fecha_pago ?? null,
                    'crm_sync_at'        => now(),
                ]
            );

            // ✅ Confirmar transacción
            DB::commit();

            // ✅ Actualizar variables de Livewire
            $this->attachments = array_values($this->files);
            $this->documentos = Documento::where('marcas_id', $this->marcaId)->get();
            $this->mmd = true;

            $operacionesUrl = url("formulario-operaciones/{$this->operacionesLink}");
            $financieraUrl = url("formulario-financiera/{$this->financieraLink}");

            // ✅ Enviar correo
            $email = Setting::get('director_administrador_email');
            $cliente = $this->nombre;
            $codigo = $this->negocio;
            $oportunidad = $this->crm;
            $gerente = $this->nomgerente;
            $mailError = false;

            try {
                Mail::send([], [], function ($message) use ($email, $cliente, $codigo, $oportunidad, $gerente) {
                    // 1) Prepara destinatario / asunto
                    $message->to($email)
                        ->subject("CRM: {$oportunidad} - Nuevo Contrato Enviado");

                    // 2) Embebe y captura los CIDs que devuelve embed()
                    $cidBanner = $message->embed(public_path('images/sign/banner.jpg'));
                    $cidSiguenos = $message->embed(public_path('images/sign/siguenos.png'));
                    $cidFacebook = $message->embed(public_path('images/sign/facebook.png'));
                    $cidInstagram = $message->embed(public_path('images/sign/instagram.png'));
                    $cidLinkedin = $message->embed(public_path('images/sign/linkedin.png'));
                    $cidX = $message->embed(public_path('images/sign/x.png'));

                    // 3) Renderiza la vista pasándole los CIDs (la vista debe usar las variables)
                    $firma = view('sign.firma', [
                        'cidBanner' => $cidBanner,
                        'cidSiguenos' => $cidSiguenos,
                        'cidFacebook' => $cidFacebook,
                        'cidInstagram' => $cidInstagram,
                        'cidLinkedin' => $cidLinkedin,
                        'cidX' => $cidX,
                    ])->render();

                    // 4) Crea el body principal (incluye la firma ya renderizada)
                    $body = "
                    <!DOCTYPE html>
                    <html>
                    <head><meta charset='utf-8'></head>
                    <body style='font-family: Arial, sans-serif;'>
                        <h2>Contrato Enviado</h2>
                        <p>Buen día,</p>
                        <p>Se ha enviado un nuevo formulario de contrato.</p>
                        <p><strong>Gerente de producto:</strong> {$gerente}</p>
                        <p><strong>Cliente:</strong> {$cliente}</p>
                        <p><strong>Código:</strong> {$codigo}</p>
                        <p><strong>N° Oportunidad:</strong> {$oportunidad}</p>
                        <p>Puede revisarlo en el sistema para su validación.</p>
                        <br>
                        <p>Saludos cordiales,</p>
                        {$firma}
                    </body>
                    </html>";

                    // 5) Asigna el HTML final al mensaje
                    $message->html($body);
                });
            } catch (\Throwable $mailException) {
                $mailError = true;
                report($mailException);
            }

            $expirationTimeFormatted = $expirationTime->format('H:i');
            session()->flash(
                'message',
                $mailError
                    ? 'Formulario guardado correctamente, pero el correo no pudo enviarse.'
                    : 'Formulario enviado correctamente. Enlaces generados.'
            );
            session()->flash('operacionesUrl', $operacionesUrl);
            session()->flash('financieraUrl', $financieraUrl);
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            session()->flash('error', 'Ocurrió un error al guardar el formulario. Inténtalo de nuevo.');
        }
    }

    public function updatedAplicagarantia($value)
    {
        if ($value === 'Fábrica' || $value === 'Impresistem') {
            $this->rules['terminogarantia'] = 'required|string|min:3';
        } else {
            $this->rules['terminogarantia'] = 'nullable';
        }
    }

    public function updatedAplicapoliza($value)
    {
        if ($value === 'si') {
            $this->rules['porcentaje'] = 'required|numeric|min:1';
        } else {
            $this->rules['porcentaje'] = 'nullable';
        }
    }

    public function cerrarmodal()
    {
        $this->dispatch('reloadPage');
    }

    public function mount($operacionesLink = null, $financieraLink = null)
    {
        $this->files = [];

        $colaborador = Colaborador::where('mail', auth()->user()->email)->first();

        if ($colaborador) {
            $this->nomgerente = $colaborador->nombre_colaborador;
            $this->corgerente = $colaborador->mail;
        }

        $this->Lineas = Linea::all();

        if ($operacionesLink || $financieraLink) {
            $this->operacionesLink = $operacionesLink;
            $this->financieraLink = $financieraLink;
        }
    }

    public function updatedSelectedDirector()
    {
        $value = $this->selectedDirector;
        if (!$value) {
            $this->DirectorEmail = '';
            $this->DirectorName = '';
            return;
        }
        $director = \App\Models\Director::find($value);
        if ($director) {
            $this->DirectorEmail = $director->mail;
            $this->DirectorName = $director->nombre_director_formatted;
        }
    }

    public function updatedSelectedEjecutivo()
    {
        $value = $this->selectedEjecutivo;
        if (!$value) {
            $this->EjecutivoEmail = '';
            $this->EjecutivoName = '';
            return;
        }
        $ejecutivo = \App\Models\Executive::find($value);
        if ($ejecutivo) {
            $this->EjecutivoEmail = $ejecutivo->mail;
            $this->EjecutivoName = $ejecutivo->nombre_colaborador_formatted;
        }
    }

    public function updatedCodlinea()
    {
        $codigo = trim((string) $this->codlinea);

        if ($codigo === '') {
            $this->linea = null;
            $this->nombreLinea = '';
            $this->selectedCodigo = null;

            return;
        }

        $linea = Linea::where('codigo_linea', $codigo)->first();

        if ($linea) {
            $this->linea = $linea->linea;   // nombre de la línea
            $this->nombreLinea = $linea->linea;
            $this->selectedCodigo = $linea->id; // opcional
        } else {
            $this->linea = null;
            $this->nombreLinea = '';
            $this->selectedCodigo = null;
        }
    }

    public function removeExistingFile($documentId)
    {
        $documento = Documento::find($documentId);
        if ($documento) {
            Storage::disk('public')->delete($documento->ruta_documento);
            $documento->delete();
            $this->existingFiles = array_filter($this->existingFiles, function ($file) use ($documentId) {
                return $file['id'] != $documentId;
            });
        }
    }

    public function updatedAttachments()
    {
        $this->validate([
            'attachments.*' => [
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,gif,zip,msg,eml',
                'max:10240',
            ],
        ]);

        foreach ($this->attachments as $file) {
            if ($file->isValid()) {
                $this->validate([
                    'attachments.*' => 'file|max:10240|mimes:pdf,doc,docx,xls,xlsx,msj,msg,eml',
                ]);
            }
        }

        foreach ($this->attachments as $file) {
            if ($file->isValid()) {
                $uniqueId = uniqid();
                $this->files[$uniqueId] = [
                    'file' => $file,
                    'name' => $file->getClientOriginalName(),
                    'size' => round($file->getSize() / 1024, 2),
                ];
            }
        }

        $this->attachments = [];
    }

    public function handleDrop($files)
    {
        foreach ($files as $file) {
            if ($file->isValid()) {
                $uniqueId = uniqid();
                $this->files[$uniqueId] = [
                    'file' => $file,
                    'name' => $file->getClientOriginalName(),
                    'size' => round($file->getSize() / 1024, 2),
                ];
            }
        }
    }

    public function updatedNegocio()
    {
        $cliente = Codigo::where('codigo_cliente', $this->negocio)->first();

        if ($cliente) {
            $this->nombre = $cliente->nombre_cliente;
        } else {
            $this->nombre = null;
        }
    }

    public function updatedHayAnticipo($value)
    {
        // Si no hay anticipo, poner 0
        if (!$value) {
            $this->porcentaje_anticipo = 0;
        }
    }

    public function updatedPrecio()
    {
        $this->precio = preg_replace('/[^0-9,.]/', '', $this->precio);
    }

    public function dragOver()
    {
        $this->dragging = true;
    }

    public function dragLeave()
    {
        $this->dragging = false;
    }

    public function copyToClipboard($text)
    {
        $this->dispatch('copy-to-clipboard', text: $text);
        session()->flash('link', 'Enlace copiado al portapapeles');
    }

    private static function parseValor(?string $raw): ?float
    {
        if ($raw === null || $raw === '') {
            return null;
        }

        $clean = preg_replace('/[^\d.,]/', '', $raw);

        if (preg_match('/\d{1,3}(\.\d{3})+(,\d+)?$/', $clean)) {
            $clean = str_replace('.', '', $clean);
            $clean = str_replace(',', '.', $clean);
        } elseif (preg_match('/\d{1,3}(,\d{3})+(\.\d+)?$/', $clean)) {
            $clean = str_replace(',', '', $clean);
        } elseif (str_contains($clean, ',') && !str_contains($clean, '.')) {
            $clean = str_replace(',', '.', $clean);
        } else {
            $clean = str_replace(',', '', $clean);
        }

        return is_numeric($clean) ? (float) $clean : null;
    }

    public function render()
    {
        return view('livewire.enviar-formulario', [
            'currentStep' => $this->currentStep,
            'operacionesLink' => $this->operacionesLink,
            'financieraLink' => $this->financieraLink,
            'ejecutivos' => \App\Models\Executive::whereNotNull('nombre_colaborador')->orderBy('nombre_colaborador')->get(),
            'directores' => \App\Models\Director::orderBy('nombre_director')->get(),
        ]);
    }
}
