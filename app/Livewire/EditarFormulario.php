<?php
namespace App\Livewire;

use App\Models\Documento;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithEvents;

trait FormatearFechas
{
    public function formatearFecha($fecha)
    {
        return $fecha ? date('Y-m-d', strtotime($fecha)) : null;
    }
}

class EditarFormulario extends Component
{
    use WithFileUploads, FormatearFechas;
    // $telgerente
    // $telgerente2
    public $formulario;
    public $attachments = [];
    public $temporaryFiles = [];
    public $existingFiles = [];
    public $archivosNuevos = [];
    public $archivosMostrados = [];
    public $negocio, $nombres, $correo, $numero, $crms;
    public $oc, $precio, $soluciones, $linea, $codlinea;
    public $nomgerente,  $corgerente, $director, $cor2gerente;
    public $entregacliente, $lugarentrega, $espais, $tiempoentrega, $terminoentrega, $tipoicoterm;
    public $prestar, $suministrar, $inicio, $finalizacion;
    public $clientcode, $clientname, $mail;
    public $cod;
    public $aplicagarantia, $terminogarantia, $aplicapoliza, $porcentaje;
    public $incluye_iva, $otros;
    // public $cotizacion;
    protected $listener = ['removeUpload', 'removeExistingFile', 'editFormulario'];
    public $marcaId;
    // public $cod_ejc;
    public $nombre_ejc;
    // public $telefono_ejc;
    public $email_ejc;
    public $documentos;
    public $documento;
    public $tipo_solicitud;
    public $nom_rep;
    public $entrega_realizar;
    public $files = [];
    public $archivosParaEliminar = [];

    protected $rules = [
        // validaciones
        // 'cod_ejc' => 'required|numeric|',
        'email_ejc' => 'required|email',
        // 'telefono_ejc' => 'required|numeric',
        'nombre_ejc' =>  'required|string|min:5',
        'terminogarantia' => 'nullable|string|min:5',
        'porcentaje' => 'nullable|numeric|min:0|max:100',

        'negocio' => 'required|numeric|',
        'nombres' => 'required|string|',
        'nom_rep' => 'required|string',
        'correo' => 'required|email|',
        'numero' => 'required|numeric',
        'crms' => 'required|string',

        // 'fecha' => 'required|date',
        // 'oc' => 'required|string|',
        'precio' => [
                    'required',
                    'regex:/^\d{1,3}(?:[\.,]\d{3})*(?:[\.,]\d+)?$/',
                    'min:5',
        ],
        // 'cotizacion' => 'nullable|max:10240',
        'soluciones' => 'required|string|',
        'linea' => 'required|string|',
        'codlinea' => 'required|string|',
        'nomgerente' => 'required|string|',
        // 'telgerente' => 'required|numeric',
        'corgerente' => 'required|email|',
        'director' => 'required|string|',
        // 'tel2gerente' => 'required|numeric',
        'cor2gerente' => 'required|email|',

        'entregacliente' => 'required|string|',
        'entrega_realizar' => 'required|string|',
        'lugarentrega' => 'required|string|',
        'espais' => 'required|string|',
        'tiempoentrega' => 'required|string|',
        'terminoentrega' => 'required|string|',
        'tipoicoterm' => 'required|string|max:255',
        'prestar' => 'required|string|',
        'suministrar' => 'required|string|',
        'inicio' => 'required|date',
        'finalizacion' => 'required|date',

        'clientname' => 'nullable|numeric',
        'mail' => 'nullable|email',
        'aplicagarantia' => 'required|string|',
        'terminogarantia' => 'nullable|string|',
        'aplicapoliza' => 'required|string|',
        'porcentaje' => 'nullable|numeric',
        'incluye_iva' => 'required',
    ];

    protected $messages = [
        // mensajes de las nuevas validaciones
        // 'cod_ejc.required' => 'El campo de codigo es requerido',
        // 'cod_ejc.numeric' => 'Este campo debe ser numerico ',


        'nombre_ejc.required' =>'Este campo es requerido',
        'nombre_ejc.string' =>'Este campo es requerido',
        'nombre_ejc.min' =>'Este campo debe tener minimo :min caracteres ',

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
        'precio' => [
            'required' => 'El campo "Precio" es obligatorio.',
            'regex' => 'El campo "Precio" debe ser un número válido con formato adecuado. Ejemplo: 1,000.00 o 1000.00.',
            'min' => 'El campo "Precio" debe tener al menos :min caracteres.',
        ],



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
        'entrega_realizar.required' =>'El campo "Entrega a Realizar" es obligatorio.',
        'entrega_realizar.string' => 'El campo "Entrega a Realizar" debe ser una cadena de texto.' ,
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
        'formapago.required' => 'El campo "Forma de Pago" es obligatorio.',
        'formapago.string' => 'El campo "Forma de Pago" debe ser una cadena de texto.',
        'moneda.required' => 'El campo "Moneda" es obligatorio.',
        'moneda.string' => 'El campo "Moneda" debe ser una cadena de texto.',
        'incluye_iva.required' => 'Este espacio es requerido.',
        'fecha_pago.required' => 'El campo "Fecha de Pago" es obligatorio.',
        'fecha_pago.date' => 'El campo "Fecha de Pago" debe ser una fecha válida.',
        'otros.string' => 'El campo "Otros" debe ser una cadena de texto.',
        // 'cotizacion.required' => 'La cotización es requerida.',
        // 'cotizacion.max' => 'El tamaño máximo permitido para la cotización es de 10 MB.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleDrop($files)
    {
        foreach ($files as $file) {
            $this->handleFileUpload($file);
        }
    }

    public function updatedAttachments($files)
    {
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            $this->handleFileUpload($file);
        }
    }

    public function handleFileUpload($file)
    {
        try {
            $originalName = $file->getClientOriginalName();
            $path = $file->store('documents', 'public');

            $this->temporaryFiles[] = [
                'name' => $originalName,
                'path' => $path,
            ];
        } catch (\Exception $e) {
            session()->flash('error', 'Error al subir el archivo: ' . $e->getMessage());
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
    $this->marcaId = $this->formulario->marca_id;

    $this->negocio = $this->formulario->infonegocio->codigo_cliente;
    $this->nombres = $this->formulario->infonegocio->nombre;
    $this->correo = $this->formulario->infonegocio->correo;
    $this->numero = $this->formulario->infonegocio->numero_celular;
    $this->crms = $this->formulario->infonegocio->n_oportunidad_crm;
    $this->nom_rep = $this->formulario->infonegocio->nom_rep;

    $this->tipo_solicitud = $this->formulario->tipo_solicitud;
    $this->nombre_ejc = $this->formulario->nombre_ejc;
    $this->email_ejc = $this->formulario->email_ejc;

    $this->oc = $this->formulario->n_oc;
    $this->precio = $this->formulario->precio_venta;
    $this->soluciones = $this->formulario->tipo_contrato;
    $this->linea = $this->formulario->linea;
    $this->codlinea = $this->formulario->codigo_linea;
    $this->nomgerente = $this->formulario->nombre;
    $this->corgerente = $this->formulario->correo_electronico;
    $this->clientcode = $this->formulario->otro;
    $this->clientname = $this->formulario->cel;
    $this->mail = $this->formulario->email;
    $this->director = $this->formulario->director;
    $this->cor2gerente = $this->formulario->correo_director;
    $this->marcaId = $this->formulario->id;

    if ($this->formulario->informacion->isNotEmpty()) {
        $info = $this->formulario->informacion->first();
        $this->entregacliente = $info->realiza_entrega_cliente;
        $this->entrega_realizar = $info->entrega_realizar;
        $this->lugarentrega = $info->lugar_entrega;
        $this->espais = $info->pais;
        $this->tiempoentrega = $info->tiempo_entrega;
        $this->terminoentrega = $this->formatearFecha($info->fecha_inicio_termino);
        $this->tipoicoterm = $info->tipo_incoterms;

        $this->prestar = $info->servicio_a_prestar;
        $this->suministrar = $info->frecuencia_suministro;

        $this->inicio = $this->formatearFecha($info->fecha_inicio);
        $this->finalizacion = $this->formatearFecha($info->fecha_finalizacion);

        if ($info->producto->isNotEmpty()) {
            $producto = $info->producto->first();
            $this->aplicagarantia = $producto->aplica_garantia;
            $this->terminogarantia = $producto->termino_garantia;
            $this->aplicapoliza = $producto->aplica_poliza;
            $this->porcentaje = $producto->porcentaje_poliza;
        }
    }

    if ($this->formulario->pago && $this->formulario->pago->isNotEmpty()) {
        $pago = $this->formulario->pago->first();
        $this->incluye_iva = $pago->incluye_iva;
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
        if(!in_array($Id, $this->archivosParaEliminar)) {
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
        foreach ($this->archivosNuevos as $file) {
            try {
                $originalName = $file->getClientOriginalName();
                $path = $file->store('documents', 'public');

                Documento::create([
                    'nombre_original' => $originalName,
                    'marcas_id' => $this->marcaId,
                    'ruta_documento' => $path,
                ]);
            } catch (\Exception $e) {
                session()->flash('error', 'Error al guardar el archivo: ' . $e->getMessage());
            }
        }

        // Reinicia la lista de archivos nuevos
        $this->archivosNuevos = [];

        // Recargar los archivos existentes
        $this->loadExistingFiles();
    }

    public function updatedArchivosNuevos()
    {
        foreach ($this->archivosNuevos as $file) {
            if (!in_array($file, $this->archivosMostrados)) {
            $this->archivosMostrados[] = $file;    
            }
        }
    }

    public function quitarArchivo($index)
    {
        if (isset($this->archivosMostrados[$index])) {
            unset($this->archivosMostrados[$index]);
            $this->archivosMostrados = array_values($this->archivosMostrados);
        }
    }

    // public function eliminarArchivo()
    // {
    //     if ($this->cotizacion) {
    //         Storage::disk('public')->delete($this->cotizacion);
    //         $this->formulario->update(['adjunto_cotizacion' => null]);
    //         $this->cotizacion = null;
    //     }
    // }

    public function submit()
    {
        // $rules = $this->rules;
        // if (!$this->formulario->adjunto_cotizacion && !$this->cotizacion) {
        //     $rules['cotizacion'] = 'required|mimes:pdf,doc,docx,xls,xlsx|max:10240';
        // }
        // $this->validate($rules);

        // $rutaAnterior = $this->formulario->adjunto_cotizacion;

        // if ($this->cotizacion instanceof \Illuminate\Http\UploadedFile) {
        //     $originalName = $this->cotizacion->getClientOriginalName();
        //     $path = "public/cotizacion/{$originalName}";

        //     if ($rutaAnterior && Storage::exists($rutaAnterior)) {
        //         Storage::delete($rutaAnterior);
        //     }

        //     $this->cotizacion->storeAs('public/cotizacion', $originalName);
        //     $this->formulario->update([
        //         'adjunto_cotizacion' => $path,
        //     ]);
        // }

        $this->formulario->update([
            // 'n_oc' => $this->oc,
            // 'fecha' => $this->fecha,
            'precio_venta' => $this->precio,
            'tipo_contrato' => $this->soluciones,
            'linea' => $this->linea,
            'codigo_linea' => $this->codlinea,
            'nombre' => $this->nomgerente,
            // 'telefono' => $this->telgerente,
            'correo_electronico' => $this->corgerente,
            'otro' => $this->clientcode,
            'cel' => $this->clientname,
            'email' => $this->mail,
            'director' => $this->director,
            // 'numero' => $this->tel2gerente,


            'correo_director' => $this->cor2gerente,
            'tipo_solicitud' => $this->tipo_solicitud,
            // 'cod_ejc' => $this->cod_ejc,
            'nombre_ejc' => $this->nombre_ejc,
            // 'telefono_ejc' => $this->telefono_ejc,
            'email_ejc' => $this->email_ejc,
        ]);

        // Actualizar información del negocio
        $this->formulario->infonegocio()->update([
            'codigo_cliente' => $this->negocio,
            'nombre' => $this->nombres,
            'correo' => $this->correo,
            'numero_celular' => $this->numero,
            'n_oportunidad_crm' => $this->crms,
            'nom_rep' => $this->nom_rep,
        ]);

        // Actualizar información
        if ($info = $this->formulario->informacion->first()) {
            $info->update([
                'realiza_entrega_cliente' => $this->entregacliente,
                'entrega_realizar' => $this->entrega_realizar,
                'lugar_entrega' => $this->lugarentrega,
                'pais' => $this->espais,
                'tiempo_entrega' => $this->tiempoentrega,
                'fecha_inicio_termino' => $this->terminoentrega,
                'tipo_incoterms' => $this->tipoicoterm,
                'servicio_a_prestar' => $this->prestar,
                'frecuencia_suministro' => $this->suministrar,
                'fecha_inicio' => $this->inicio,
                'fecha_finalizacion' => $this->finalizacion,
            ]);

            // Actualizar producto
            if ($producto = $info->producto->first()) {
                $producto->update([
                    // 'detalles_equipos' => $this->details,
                    'aplica_garantia' => $this->aplicagarantia,
                    'termino_garantia' => $this->terminogarantia,
                    'aplica_poliza' => $this->aplicapoliza,
                    'porcentaje_poliza' => $this->porcentaje,
                ]);
            }
        }
        // Actualizar pago
        if ($pago = $this->formulario->pago->first()) {
            $pago->update([
                // 'fecha_pago' => $this->fecha_pago,
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

        $this->dispatch('formularioUpdated');
        return redirect()->route('historial');
    }


    public function render()
    {
        return view('livewire.editar-formulario');
    }
}
