<?php

namespace App\Livewire;

use App\Livewire\Traits\FormatearFechas;
use App\Livewire\Traits\InvertirNombre;
use App\Models\Documento;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarFormulario extends Component
{
    use WithFileUploads, FormatearFechas, InvertirNombre;
    // $telgerente
    // $telgerente2
    public $formulario;
    public $existingFiles = [];
    public $archivosNuevos = [];
    public $tempFiles = [];
    public $dragging = false;
    public $negocio, $nombres, $correo, $numero, $crms;
    public $oc, $precio, $soluciones, $linea, $linea_especifica, $codlinea;
    public $nombreLinea = '';
    public $nomgerente,  $corgerente, $director, $cor2gerente;
    public $entregacliente, $lugarentrega, $espais, $tiempoentrega, $tiempo_entrega_cantidad, $tiempo_entrega_unidad, $terminoentrega, $tipoicoterm;
    public $prestar, $suministrar, $inicio, $finalizacion;
    public $clientcode, $clientname, $mail;
    public $cod;
    public $aplicagarantia, $terminogarantia, $aplicapoliza, $porcentaje;
    public $incluye_iva, $otros, $orden_compra;
    // public $cotizacion;
    protected $listeners = ['removeUpload', 'removeExistingFile', 'editFormulario'];
    public $marcaId;
    // public $cod_ejc;
    public $nombre_ejc;
    // public $telefono_ejc;
    public $email_ejc;
    public $documentos;
    public $tipo_solicitud;
    public $nom_rep;
    public $cantidad_entregas;
    public $fecha_entrega;
    public $files = [];
    public $archivosParaEliminar = [];
    public $moneda_precio_venta;
    public $forma_pago;
    public $fecha_cada_pago;
    public $moneda;
    public $hay_anticipo;
    public $porcentaje_anticipo;
    public $fecha_pago_anticipo;
    public $otros_pago;


    protected $rules = [
        // validaciones
        // 'cod_ejc' => 'required|numeric|',
        'email_ejc' => 'required|email',
        // 'telefono_ejc' => 'required|numeric',
        'nombre_ejc' =>  'required|string|min:5',
        'terminogarantia' => 'nullable|string|min:5',
        'porcentaje' => 'nullable|numeric|min:0|max:100',

        'negocio' => 'required|string|regex:/^[\d,\.]+$/',
        'nombres' => 'required|string|',
        'nom_rep' => 'required|string',
        'correo' => 'required|email|',
        'numero' => 'required|numeric',
        'crms' => 'required|string',

        // 'fecha' => 'required|date',
        // 'oc' => 'required|string|',
        'precio' => 'required|string|regex:/^[\d,\.]+$/',
        // 'cotizacion' => 'nullable|max:10240',
        'soluciones' => 'required|string|',
        'linea' => 'nullable|string',
        'linea_especifica' => 'nullable|string|in:EBG,Solar,Daas,HPE',
        'codlinea' => 'required|string|',
        'nomgerente' => 'required|string|',
        // 'telgerente' => 'required|numeric',
        'corgerente' => 'required|email|',
        'director' => 'required|string|',
        // 'tel2gerente' => 'required|numeric',
        'cor2gerente' => 'required|email|',

        'entregacliente' => 'required|string|',
        'cantidad_entregas' => 'nullable|integer|min:1',
        'fecha_entrega' => 'nullable|date',
        'lugarentrega' => 'required|string|',
        'espais' => 'required|string|',
        'tiempoentrega' => 'nullable|string',
        'tiempo_entrega_cantidad' => 'nullable|integer|min:1',
        'tiempo_entrega_unidad' => 'nullable|string|in:Días,Semanas,Meses,Años',
        'terminoentrega' => 'required|string|',
        'tipoicoterm' => 'required|string|max:255',
        'prestar' => 'nullable|string',
        'suministrar' => 'nullable|string',
        'inicio' => 'nullable|date',
        'finalizacion' => 'nullable|date',

        'clientname' => 'nullable|numeric',
        'mail' => 'nullable|email',
        'aplicagarantia' => 'required|in:si,no',
        'aplicapoliza' => 'required|in:si,no',
        'incluye_iva' => 'required',
        'forma_pago' => 'nullable|string|max:255',
        'moneda' => 'nullable|string',
        //'fecha_pago' => 'required|date',
        'otros' => 'nullable|string',
        'orden_compra' => 'nullable|string|min:1',
        'moneda_precio_venta' => 'required|string',
        'fecha_cada_pago' => 'nullable|string',
        'hay_anticipo' => 'nullable|boolean',
        'porcentaje_anticipo' => 'nullable|numeric|min:0|max:100',
        'fecha_pago_anticipo' => 'nullable|date',
        'otros_pago' => 'nullable|string',
        'archivosNuevos' => 'nullable|array',
        'archivosNuevos.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,gif,zip,msg,eml|max:10240',
    ];

    protected $messages = [
        // mensajes de las nuevas validaciones
        // 'cod_ejc.required' => 'El campo de codigo es requerido',
        // 'cod_ejc.numeric' => 'Este campo debe ser numerico ',


        'nombre_ejc.required' => 'Este campo es requerido',
        'nombre_ejc.string' => 'Este campo es requerido',
        'nombre_ejc.min' => 'Este campo debe tener minimo :min caracteres ',

        // 'telefono_ejc.required' => 'Este campo es requerido',
        // 'telefono_ejc.numeric' => 'Este campo es tipo numerico',

        'email_ejc.required' => 'Este campo es requerido',
        'email_ejc.email' => 'El correo debe ser valido',
        'negocio.required' => 'El campo "Negocio" es obligatorio.',
        'negocio.numeric' => 'El campo "Negocio" debe ser un número sin espacios.',
        'nombres.required' => 'El campo "Nombres" es obligatorio.',
        'nombres.string' => 'El campo "Nombres" debe ser una cadena de texto.',
        'nom_rep.required' => 'El campo "Nombre del representante legal" es obligatorio.',
        'nom_rep.string' => 'El campo "Nombre del representante legal" debe ser una cadena de texto.',
        'correo.required' => 'El campo "Correo" es obligatorio.',
        'correo.email' => 'El campo "Correo" debe ser un correo electrónico válido.',
        'numero.required' => 'El campo "Número" es obligatorio.',
        'numero.numeric' => 'El campo "Número" debe ser un número sin espacios.',
        'crms.required' => 'El campo "CRM" es obligatorio.',
        'crms.string' => 'El campo "CRM" debe ser una cadena de texto.',
        // 'crms.unique' => 'El número "CRM" ya está registrado. Por favor, ingrese un número único.',

        // 'fecha.required' => 'El campo "Fecha" es obligatorio.',
        // 'fecha.date' => 'El campo "Fecha" debe ser una fecha válida.',
        'oc.required' => 'El campo "OC" es obligatorio.',
        'oc.string' => 'El campo "OC" debe ser una cadena de texto.',
        'precio.required' => 'El campo "Precio" es obligatorio.',
        'precio.regex' => 'El campo "Precio" solo puede contener números, comas y puntos.',



        'soluciones.required' => 'El campo "Soluciones" es obligatorio.',
        'soluciones.string' => 'El campo "Soluciones" debe ser una cadena de texto.',
        'linea.required' => 'El campo "Línea" es obligatorio.',
        'linea.string' => 'El campo "Línea" debe ser una cadena de texto.',
        'codlinea.required' => 'El campo "Código de línea" es obligatorio.',
        'codlinea.string' => 'El campo "Código de línea" debe ser una cadena de texto.',
        'nomgerente.required' => 'El campo "Nombre del Gerente" es obligatorio.',
        'nomgerente.string' => 'El campo "Nombre del Gerente" debe ser una cadena de texto.',
        // 'telgerente.required' => 'El campo "Teléfono del Gerente" es obligatorio.',
        // 'telgerente.numeric' => 'El campo "Teléfono del Gerente" debe ser un número sin espacios.',
        'corgerente.required' => 'El campo "Correo del Gerente" es obligatorio.',
        'corgerente.email' => 'El campo "Correo del Gerente" debe ser un correo electrónico válido.',
        'director.required' => 'El campo "Director" es obligatorio.',
        'director.string' => 'El campo "Director" debe ser una cadena de texto.',
        // 'tel2gerente.required' => 'El campo "Teléfono 2 del Gerente" es obligatorio.',
        // 'tel2gerente.numeric' => 'El campo "Teléfono 2 del Gerente" debe ser un número sin espacios.',
        'cor2gerente.required' => 'El campo "Correo 2 del Gerente" es obligatorio.',
        'cor2gerente.email' => 'El campo "Correo 2 del Gerente" debe ser un correo electrónico válido.',
        'entregacliente.required' => 'El campo "Entrega Cliente" es obligatorio.',
        'entregacliente.string' => 'El campo "Entrega Cliente" debe ser una cadena de texto.',
        'entrega_realizar.required' => 'El campo "Entrega a Realizar" es obligatorio.',
        'entrega_realizar.string' => 'El campo "Entrega a Realizar" debe ser una cadena de texto.',
        'lugarentrega.required' => 'El campo "Lugar de Entrega" es obligatorio.',
        'lugarentrega.string' => 'El campo "Lugar de Entrega" debe ser una cadena de texto.',
        'espais.required' => 'El campo "Espacio" es obligatorio.',
        'espais.string' => 'El campo "Espacio" debe ser una cadena de texto.',
        'tiempoentrega.required' => 'El campo "Tiempo de Entrega" es obligatorio.',
        'tiempoentrega.string' => 'El campo "Tiempo de Entrega" debe ser una cadena de texto.',
        'terminoentrega.required' => 'El campo "Término de Entrega" es obligatorio.',
        'terminoentrega.string' => 'El campo "Término de Entrega" debe ser una cadena de texto.',
        'tipoicoterm.required' => 'El campo "Tipo Incoterm" es obligatorio.',
        'tipoicoterm.string' => 'El campo "Tipo Incoterm" debe ser una cadena de texto.',
        'tipoicoterm.max' => 'El campo "Tipo Incoterm" no puede superar los 255 caracteres.',
        'prestar.required' => 'El campo "Prestar" es obligatorio.',
        'prestar.string' => 'El campo "Prestar" debe ser una cadena de texto.',
        'suministrar.required' => 'El campo "Suministrar" es obligatorio.',
        'suministrar.string' => 'El campo "Suministrar" debe ser una cadena de texto.',
        'inicio.required' => 'El campo "Inicio" es obligatorio.',
        'inicio.date' => 'El campo "Inicio" debe ser una fecha válida.',
        'finalizacion.required' => 'El campo "Finalización" es obligatorio.',
        'finalizacion.date' => 'El campo "Finalización" debe ser una fecha válida.',
        'clientcode.required' => 'El campo "Código del Cliente" es obligatorio.',
        'clientcode.string' => 'El campo "Código del Cliente" debe ser una cadena de texto.',
        'clientname.numeric' => 'El campo "Teléfono" debe ser numerico sin espacios.',
        'mail.email' => 'El campo "Correo del Cliente" debe ser un correo electrónico válido.',
        'details.required' => 'El campo "Detalles" es obligatorio.',
        'details.string' => 'El campo "Detalles" debe ser una cadena de texto.',
        'aplicagarantia.required' => 'El campo "Aplicar Garantía" es obligatorio.',
        'aplicagarantia.string' => 'El campo "Aplicar Garantía" debe ser una cadena de texto.',
        'terminogarantia.required' => 'El campo "Término de Garantía" es obligatorio.',
        'terminogarantia.string' => 'El campo "Término de Garantía" debe ser una cadena de texto.',
        'aplicapoliza.required' => 'El campo "Aplicar Póliza" es obligatorio.',
        'aplicapoliza.string' => 'El campo "Aplicar Póliza" debe ser una cadena de texto.',
        'porcentaje.required' => 'El campo "Porcentaje" es obligatorio.',
        'porcentaje.numeric' => 'El campo "Porcentaje" debe ser un número sin espacios.',
        'forma_pago.string' => 'El campo "Forma de Pago" debe ser una cadena de texto.',
        'moneda.required' => 'El campo "Moneda" es obligatorio.',
        'moneda.string' => 'El campo "Moneda" debe ser una cadena de texto.',
        'incluye_iva.required' => 'Este espacio es requerido.',
        'fecha_pago.required' => 'El campo "Fecha de Pago" es obligatorio.',
        'fecha_pago.date' => 'El campo "Fecha de Pago" debe ser una fecha válida.',
        'otros.string' => 'El campo "Otros" debe ser una cadena de texto.',
        'moneda_precio_venta.string' => 'El campo "Moneda Precio Venta" debe ser una cadena de texto.',
        'fecha_cada_pago.string' => 'El campo "Fecha Cada Pago" debe ser una cadena de texto.',
        'hay_anticipo.boolean' => 'El campo "Hay Anticipo" debe ser verdadero o falso.',
        'porcentaje_anticipo.numeric' => 'El campo "Porcentaje Anticipo" debe ser un número entre 0 y 100.',
        'porcentaje_anticipo.min' => 'El campo "Porcentaje Anticipo" debe ser al menos :min.',
        'porcentaje_anticipo.max' => 'El campo "Porcentaje Anticipo" no puede ser mayor a :max.',
        'fecha_pago_anticipo.date' => 'El campo "Fecha Pago Anticipo" debe ser una fecha válida.',
        'otros_pago.string' => 'El campo "Otros Pago" debe ser una cadena de texto.',
        // 'cotizacion.required' => 'El campo "Cotización" es obligatorio.',
        // 'cotizacion.mimes' => 'El archivo de cotización debe ser un PDF, DOC, DOCX, XLS o XLSX.',

        // 'cotizacion.required' => 'La cotización es requerida.',
        // 'cotizacion.max' => 'El tamaño máximo permitido para la cotización es de 10 MB.',


    ];

    public function updated($propertyName)
    {
        if (array_key_exists($propertyName, $this->rules ?? [])) {
            $this->validateOnly($propertyName);
        }
    }

    public function updatedCodlinea($value)
    {
        $codigo = trim((string) $value);

        if ($codigo === '') {
            $this->linea = null;
            $this->nombreLinea = '';
            return;
        }

        $linea = \App\Models\Linea::where('codigo_linea', $codigo)->first();

        if ($linea) {
            $this->linea = $linea->linea;
            $this->nombreLinea = $linea->linea;
        } else {
            $this->linea = null;
            $this->nombreLinea = '';
        }
    }

    public function handleDrop($files)
    {
        foreach ($files as $file) {
            if ($file->isValid()) {
                $id = uniqid();
                $this->tempFiles[$id] = [
                    'file' => $file,
                    'name' => $file->getClientOriginalName(),
                    'size' => round($file->getSize() / 1024, 2),
                ];
            }
        }
    }

    public function updatedArchivosNuevos()
    {
        if (!is_array($this->archivosNuevos)) {
            $this->archivosNuevos = [$this->archivosNuevos];
        }

        foreach ($this->archivosNuevos as $file) {
            if ($file->isValid()) {
                $id = uniqid();
                $this->tempFiles[$id] = [
                    'file' => $file,
                    'name' => $file->getClientOriginalName(),
                    'size' => round($file->getSize() / 1024, 2),
                ];
            }
        }

        $this->archivosNuevos = [];
    }

    public function dragOver()
    {
        $this->dragging = true;
    }

    public function dragLeave()
    {
        $this->dragging = false;
    }

    public function quitarArchivo($id)
    {
        if (isset($this->tempFiles[$id])) {
            unset($this->tempFiles[$id]);
        }
    }

    public function mount($formulario)
    {
        // Buscar el formulario completo por ID con todas las relaciones necesarias
        $this->formulario = Marca::with([
            'infonegocio',
            'informacion.producto',
            'pago',
            'financiera',
            'infoEntrega',
            'documento',
            'formLinks'
        ])->findOrFail($formulario);

        // A partir de aquí, se mantiene tu lógica actual
        $this->negocio = $this->formulario->infonegocio->codigo_cliente;
        $this->nombres = $this->formulario->infonegocio->nombre_formatted;
        $this->correo = $this->formulario->infonegocio->correo;
        $this->numero = $this->formulario->infonegocio->numero_celular;
        $this->crms = $this->formulario->infonegocio->n_oportunidad_crm;
        $this->nom_rep = $this->formulario->infonegocio->nom_rep;

        $this->tipo_solicitud = $this->formulario->tipo_solicitud;
        $this->nombre_ejc = $this->formulario->nombre_ejc_formatted;
        $this->email_ejc = $this->formulario->email_ejc;

        $this->oc = $this->formulario->n_oc;
        $this->precio = $this->formulario->precio_venta;
        $this->soluciones = $this->formulario->tipo_contrato;
        $this->linea = $this->formulario->linea;
        $this->codlinea = $this->formulario->codigo_linea;
        $this->nombreLinea = $this->formulario->codigo_linea 
            ? (\App\Models\Linea::where('codigo_linea', $this->formulario->codigo_linea)
                ->value('linea') ?? '')
            : '';
        $this->nomgerente = $this->formulario->nombre;
        $this->corgerente = $this->formulario->correo_electronico;
        $this->clientcode = $this->formulario->otro;
        $this->clientname = $this->formulario->cel;
        $this->mail = $this->formulario->email;
        $this->director = $this->formulario->director;
        $this->cor2gerente = $this->formulario->correo_director;
        $this->marcaId = $this->formulario->id;
        $this->moneda_precio_venta = $this->formulario->moneda_precio_venta;
        $this->forma_pago = $this->formulario->forma_pago;
        $this->fecha_cada_pago = $this->formulario->fecha_cada_pago;
        $this->moneda = $this->formulario->moneda;
        $this->incluye_iva = $this->formulario->incluir_iva;
        $this->hay_anticipo = $this->formulario->hay_anticipo;
        $this->porcentaje_anticipo = $this->formulario->porcentaje_anticipo;
        $this->fecha_pago_anticipo = $this->formulario->fecha_pago_anticipo;
        $this->otros_pago = $this->formulario->otros_pago;
        $this->orden_compra = $this->formulario->orden_compra;

        if ($this->formulario->informacion->isNotEmpty()) {
            $info = $this->formulario->informacion->first();
            $this->entregacliente = $info->realiza_entrega_cliente;
            $this->cantidad_entregas = $info->cantidad_entregas;
            $this->fecha_entrega = $info->fecha_entrega ? \Carbon\Carbon::parse($info->fecha_entrega)->format('Y-m-d') : null;
            $this->lugarentrega = $info->lugar_entrega;
            $this->espais = $info->pais;
            $this->tiempoentrega = $info->tiempo_entrega;
            $this->tiempo_entrega_cantidad = $info->tiempo_entrega_cantidad;
            $this->tiempo_entrega_unidad = $info->tiempo_entrega_unidad;
            $this->terminoentrega = $this->formatearFecha($info->fecha_inicio_termino);
            $this->tipoicoterm = $info->tipo_incoterms;

            $this->prestar = $info->servicio_a_prestar;
            $this->suministrar = $info->frecuencia_suministro;

            $this->inicio = $this->formatearFecha($info->fecha_inicio);
            $this->finalizacion = $this->formatearFecha($info->fecha_finalizacion);
            $this->linea_especifica = $info->linea_especifica;

            if ($info->producto->isNotEmpty()) {
                $producto = $info->producto->first();
                $this->aplicagarantia = $producto->aplica_garantia;
                $this->terminogarantia = $producto->termino_garantia;
                $this->aplicapoliza = $producto->aplica_poliza;
                $this->porcentaje = $producto->porcentaje_poliza;
            }
        }

        $this->existingFiles = $this->formulario->documento
            ->map(function ($documento) {
                return [
                    'id' => $documento->id,
                    'name' => $documento->nombre_original,
                    'path' => $documento->ruta_documento,
                    'tipo' => $documento->tipo_documento,
                ];
            })
            ->toArray();
    }

    public function loadExistingFiles()
    {
        $this->existingFiles = Documento::where('marcas_id', $this->marcaId)
            ->get()
            ->map(function ($documento) {
                return [
                    'id' => $documento->id,
                    'name' => $documento->nombre_original,
                    'path' => $documento->ruta_documento,
                    'tipo' => $documento->tipo_documento,
                ];
            })
            ->toArray();
    }


    public function marcarArchivosParaEliminar($Id)
    {
        if (!in_array($Id, $this->archivosParaEliminar)) {
            $this->archivosParaEliminar[] = $Id;
        }

        $this->existingFiles = array_filter(
            $this->existingFiles,
            function ($file) use ($Id) {
                return $file['id'] != $Id;
            }
        );
    }

    public function removeExistingFile($documentId)
    {
        $documento = Documento::find($documentId);

        if ($documento) {
            Storage::disk('public')->delete($documento->ruta_documento);
            $documento->delete();

            $this->existingFiles = array_filter(
                array_filter($this->existingFiles, function ($file) use ($documentId) {
                    return $file['id'] != $documentId;
                }),
            );
        }
    }

    public function saveNewFiles()
    {
        foreach ($this->tempFiles as $file) {
            try {
                $originalName = $file['name'];
                $path = $file['file']->store('documents', 'public');

                Documento::create([
                    'nombre_original' => $originalName,
                    'marcas_id' => $this->marcaId,
                    'ruta_documento' => $path,
                ]);
            } catch (\Exception $e) {
                session()->flash('error', 'Error al guardar el archivo: ' . $e->getMessage());
            }
        }

        $this->tempFiles = [];

        $this->loadExistingFiles();
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {
            $this->formulario->update([
                'precio_venta' => $this->precio,
                'tipo_contrato' => $this->soluciones,
                'linea' => $this->linea,
                'codigo_linea' => $this->codlinea,
                'nombre' => $this->nomgerente,
                'correo_electronico' => $this->corgerente,
                'otro' => $this->clientcode,
                'cel' => $this->clientname,
                'email' => $this->mail,
                'director' => $this->director,
                'correo_director' => $this->cor2gerente,
                'tipo_solicitud' => $this->tipo_solicitud,
                'nombre_ejc' => $this->nombre_ejc,
                'email_ejc' => $this->email_ejc,
                'moneda_precio_venta' => $this->moneda_precio_venta,
                'forma_pago' => $this->forma_pago,
                'fecha_cada_pago' => $this->fecha_cada_pago,
                'moneda' => $this->moneda,
                'incluir_iva' => $this->incluye_iva,
                'hay_anticipo' => $this->hay_anticipo,
                'porcentaje_anticipo' => $this->porcentaje_anticipo,
                'fecha_pago_anticipo' => $this->fecha_pago_anticipo,
                'otros_pago' => $this->otros_pago,
                'orden_compra' => $this->orden_compra,
            ]);

            $this->formulario->infonegocio()->update([
                'codigo_cliente' => $this->negocio,
                'nombre' => $this->nombres,
                'correo' => $this->correo,
                'numero_celular' => $this->numero,
                'n_oportunidad_crm' => $this->crms,
                'nom_rep' => $this->nom_rep,
            ]);

            if ($info = $this->formulario->informacion->first()) {
                $info->update([
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

                if ($producto = $info->producto->first()) {
                    $producto->update([
                        'aplica_garantia' => $this->aplicagarantia,
                        'termino_garantia' => $this->terminogarantia,
                        'aplica_poliza' => $this->aplicapoliza,
                        'porcentaje_poliza' => $this->porcentaje,
                    ]);
                }
            }

            if ($pago = $this->formulario->pago->first()) {
                $pago->update([
                    'incluye_iva' => $this->incluye_iva,
                ]);
            }

            if (!empty($this->archivosParaEliminar)) {
                foreach ($this->archivosParaEliminar as $id) {
                    $documento = Documento::find($id);
                    if ($documento) {
                        Storage::disk('public')->delete($documento->ruta_documento);
                        $documento->delete();
                    }
                }

                $this->archivosParaEliminar = [];
            }

            $this->saveNewFiles();
        });

        $this->dispatch('formularioUpdated');
        return redirect()->route('historial');
    }


    public function render()
    {
        return view('livewire.editar-formulario');
    }
}
