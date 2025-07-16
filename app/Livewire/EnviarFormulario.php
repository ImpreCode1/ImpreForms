<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Documento;
use App\Models\Executive;
use App\Models\Financiera;
use App\Models\Infonegocio;
use App\Models\Informacion;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\Pago;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class EnviarFormulario extends Component
{
    public $currentStep = 1;
    use WithFileUploads;

    // identificadores de archivos por id

    public $marcasId;
    public $documento;
    public $documentos;
    // fin de manejo de documentos
    public $hasAdvancePayment = null;
    public $advancePaymentPercentage = null;
    public $advancePaymentDate = null;
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
    public $codlinea;
    public $nomgerente;
    // public $telgerente;
    public $corgerente;
    public $director;
    // public $tel2gerente;
    public $cor2gerente;
    public $entregacliente;
    public $lugarentrega;
    public $espais;
    public $tiempoentrega;
    public $terminoentrega;
    public $tipoicoterm;
    public $prestar;
    public $suministrar;
    public $inicio;
    public $finalizacion;
    public $nom_rep;
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

    public $other;
    public $actualpago;
    public $monedaactual;
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

    // public $cod_ejc;
    public $nombre_ejc;
    // public $telefono_ejc;
    public $email_ejc;
    public $tipo_solicitud = '';

    public $operacionesLink;
    public $financieraLink;
    public $marcaId;
    public $cod;
    public $files = [];
    public $dragging = false;
    public $entrega_realizar;
    public $mmd = false;
    public $Ejecutivos;
    public $Lineas;
    public $selectedEjecutivo = null;
    public $EjecutivoEmail = '';
    public $EjecutivoName = '';
    public $selectedCodigo = null;

    protected $listeners = ['openModal'];
    protected $rules = [
        'attachments' => 'required|max:10240',
        // 'cod_ejc' => 'required|numeric|',

        //* Infonegocio
        'tipo_solicitud' => 'required',
        'negocio' => 'required|numeric|min:5',
        'nombre' => 'required|string|min:5',
        'correo' => 'required|email',
        'numero' => 'required|numeric',
        'crm' => 'required|numeric|unique:infonegocio,n_oportunidad_crm',

        //* Marca
        // 'fecha' => 'required',
        // 'oc' => 'required|string|min:5',
        'precio' => ['required', 'regex:/^\d{1,3}((\.\d{3})*)?$/', 'min:4'],

        // 'cotizacion' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        'soluciones' => 'required|string|min:5',
        'linea' => 'required|string|min:5',
        'codlinea' => 'required|string',
        'nomgerente' => 'required|string|min:5',
        // 'telgerente' => 'required|numeric',
        'nom_rep' => 'required|string',
        // 'email_ejc' => 'required|email',
        // 'EjecutivoEmail' => 'required|email',
        'corgerente' => 'required|email',
        'director' => 'required|string|min:5',
        // 'tel2gerente' => 'required|numeric',
        'cor2gerente' => 'required|email',
        // 'telefono_ejc' => 'required|numeric',
        //* Campos opcionales en Marca
        'clientcode' => 'nullable|string|min:5',
        'clientname' => 'nullable|numeric',
        'mail' => 'nullable|email',
        // 'nombre_ejc' =>  'required|string|min:5',
        //* Información
        'entregacliente' => 'required|string|min:5',
        'entrega_realizar' => 'required|string|min:5',
        'lugarentrega' => 'required|string|min:5',
        'espais' => 'required|string|min:5',
        'tiempoentrega' => 'required|string|min:3',
        'terminoentrega' => 'required|date',
        'tipoicoterm' => 'required|string|min:2',
        'prestar' => 'required|string|min:4',
        'suministrar' => 'required|string|min:5',
        'inicio' => 'required|date',
        'finalizacion' => 'required|date',

        //* Producto
        'aplicagarantia' => 'required|string',
        'aplicapoliza' => 'required|string',

        //* Condiciones de Pago
        'incluye_iva' => 'required|boolean',
    ];

    protected $messages = [
        //* Mensajes generales de validación
        'nom_rep.string' => 'El nombre no debe contener caracteres extraños',

        'nom_rep.required' => 'El campo es requerido',

        //* Infonegocio
        'negocio.required' => 'El código del cliente es obligatorio.',
        'negocio.numeric' => 'El código del cliente debe ser un número sin espacios.',
        // 'negocio.unique' => 'El código del cliente ya está registrado.',
        'negocio.min' => 'El código del cliente debe tener almenos :min caracteres.',

        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
        'correo.required' => 'El correo electrónico es obligatorio.',
        'correo.email' => 'El correo electrónico debe ser válido.',
        'numero.required' => 'El número de teléfono es obligatorio.',
        'numero.numeric' => 'El número de teléfono debe contener solo números sin espacios.',
        'crm.required' => 'El número CRM es obligatorio.',
        'crm.numeric' => 'El número CRM debe ser numérico sin espacios.',
        'crm.unique' => 'El número CRM ya está registrado. Por favor, ingrese un número único.',

        //* Marca
        // 'fecha.required' => 'La fecha es obligatoria.',
        // 'fecha.date' => 'La fecha debe tener un formato válido.',
        // 'oc.required' => 'La orden de compra es obligatoria.',
        // 'oc.min' => 'La orden de compra debe tener al menos :min caracteres.',
        // 'cod_ejc.required' => 'El campo de codigo es requerido',
        // 'cod_ejc.numeric' => 'Este campo debe ser numerico sin espacios ',

        'tipo_solicitud.required' => 'Este campo es requerido',
        // 'nombre_ejc.required' =>'Este campo es requerido',
        // 'nombre_ejc.string' =>'Este campo es requerido',
        // 'nombre_ejc.min' =>'Este campo debe tener minimo :min caracteres ',

        // 'telefono_ejc.required' => 'Este campo es requerido',
        // 'telefono_ejc.numeric' => 'Este campo es tipo numerico sin espacios',

        // 'email_ejc.required' => 'Este campo es requerido',
        // 'email_ejc.email' => 'El correo debe ser valido',

        'precio' => [
            'required' => 'El campo "Precio" es obligatorio.',
            'regex' => 'El campo "Precio" debe ser un número válido con formato adecuado. Ejemplo: 1.000.000',
            'min' => 'El campo "Precio" debe tener al menos :min caracteres.',
        ],

        // 'cotizacion.file' => 'La cotización debe ser un archivo.',
        // 'cotizacion.mimes' => 'La cotización debe ser un archivo PDF, Word o Excel.',
        // 'cotizacion.max' => 'La cotización no debe pesar más de 10MB.',
        'soluciones.required' => 'Las soluciones son obligatorias.',
        'soluciones.min' => 'Las soluciones deben tener al menos :min caracteres.',
        'linea.required' => 'La línea es obligatoria.',
        'linea.min' => 'La línea debe tener al menos :min caracteres.',
        'codlinea.required' => 'El código de línea es obligatorio.',
        // 'codlinea.min' => 'El código de línea debe tener al menos :min caracteres.',
        'nomgerente.required' => 'El nombre del gerente es obligatorio.',
        'nomgerente.min' => 'El nombre del gerente debe tener al menos :min caracteres.',
        // 'telgerente.required' => 'El teléfono del gerente es obligatorio.',
        // 'telgerente.numeric' => 'El teléfono del gerente debe contener solo números sin espacios.',
        'corgerente.required' => 'El correo del gerente es obligatorio.',
        'corgerente.email' => 'El correo del gerente debe ser válido.',
        'director.required' => 'El nombre del director es obligatorio.',
        'director.min' => 'El nombre del director debe tener al menos :min caracteres.',
        // 'tel2gerente.required' => 'El teléfono del segundo gerente es obligatorio.',
        // 'tel2gerente.numeric' => 'El teléfono del segundo gerente debe contener solo números sin espacios.',
        'cor2gerente.required' => 'El correo del segundo gerente es obligatorio.',
        'cor2gerente.email' => 'El correo del segundo gerente debe ser válido.',

        //* Campos opcionales en Marca
        'clientcode.min' => 'El código de cliente debe tener al menos :min caracteres.',
        'clientname.numeric' => 'El numero del cliente debe ser numérico sin espacios.',
        'mail.email' => 'El correo debe ser una dirección válida.',

        //* Información
        'entregacliente.required' => 'Debe especificar si realiza la entrega al cliente.',
        'entregacliente.min' => 'La especificación de entrega debe tener al menos :min caracteres.',
        'entrega_realizar.required' => 'Debe especificar la entrega realizada.',
        'entrega_realizar.min' => 'La realizacion de entrega debe tener al menos :min caracteres.',
        'lugarentrega.required' => 'El lugar de entrega es obligatorio.',
        'lugarentrega.min' => 'El lugar de entrega debe tener al menos :min caracteres.',
        'espais.required' => 'El país es obligatorio.',
        'espais.min' => 'El país debe tener al menos :min caracteres.',
        'tiempoentrega.required' => 'El tiempo de entrega es obligatorio.',
        'tiempoentrega.min' => 'El tiempo de entrega debe tener al menos :min caracteres.',
        'terminoentrega.required' => 'El término de entrega es obligatorio.',
        'terminoentrega.date' => 'El término de entrega debe ser una fecha válida.',
        'tipoicoterm.required' => 'El tipo de Incoterm es obligatorio.',
        'tipoicoterm.min' => 'El tipo de Incoterm debe tener al menos :min caracteres.',
        'prestar.required' => 'Debe especificar si se prestará el servicio.',
        'prestar.min' => 'La especificación de préstamo debe tener al menos :min caracteres.',
        'suministrar.required' => 'Debe especificar si se suministrará el producto.',
        'suministrar.min' => 'La especificación de suministro debe tener al menos :min caracteres.',
        'inicio.required' => 'La fecha de inicio es obligatoria.',
        'inicio.date' => 'La fecha de inicio debe ser válida.',
        'finalizacion.required' => 'La fecha de finalización es obligatoria.',
        'finalizacion.date' => 'La fecha de finalización debe ser válida.',

        //* Producto
        'details.required' => 'Los detalles del producto son obligatorios.',
        'details.min' => 'Los detalles del producto deben tener al menos :min caracteres.',
        'aplicagarantia.required' => 'Debe especificar si aplica garantía.',
        'aplicagarantia.min' => 'La especificación de garantía debe tener al menos :min caracteres.',
        // 'terminogarantia.required' => 'El término de garantía es obligatorio.',
        // 'terminogarantia.min' => 'El término de garantía debe tener al menos :min caracteres.',
        'aplicapoliza.required' => 'Debe especificar si aplica póliza.',
        'aplicapoliza.min' => 'La especificación de póliza debe tener al menos :min caracteres.',

        'porcentaje.required' => 'El porcentaje es obligatorio.',
        'porcentaje.numeric' => 'El porcentaje debe ser un número.',
        'porcentaje.min' => 'El porcentaje no puede ser menor que 0.',
        'porcentaje.max' => 'El porcentaje no puede ser mayor que 100.',

        //* Condiciones de Pago
        'formapago.required' => 'La forma de pago es obligatoria.',
        'formapago.string' => 'La forma de pago debe ser texto.',
        'moneda.required' => 'La moneda es obligatoria.',
        'moneda.string' => 'La moneda debe ser texto.',
        'incluye_iva.required' => 'Debe especificar si incluye IVA.',
        'incluye_iva.boolean' => 'El campo incluye IVA debe ser verdadero o falso.',
        'fecha_pago.required' => 'La fecha de pago es obligatoria.',
        'fecha_pago.date' => 'La fecha de pago debe ser una fecha válida.',

        //* documentos
        'attachments.required' => 'El campo archivo adjunto es requerido.',
        'attachments.max' => 'El archivo no puede exceder los 10 MB de tamaño.',
    ];

    //* mostrar garantia
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
        }

        $this->attachments = array_filter($this->attachments, function ($file) use ($fileId) {
            return $file->getClientOriginalName() !== ($this->files[$fileId]['name'] ?? '');
        });

        $this->files = array_values($this->files);
    }

    public function setAdvancePayment($value)
    {
        $this->hasAdvancePayment = $value;

        if ($value === 'no') {
            $this->advancePaymentPercentage = null;
            $this->advancePaymentDate = null;
        }
    }

    public function submit()
    {
        $this->validate();

        $infonegocio = Infonegocio::create([
            'codigo_cliente' => $this->negocio, // * no puede ser igual a otro y es numerico obligatorio
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'numero_celular' => $this->numero,
            'n_oportunidad_crm' => $this->crm, // *  es numerico obligatorio
            'nom_rep' => $this->nom_rep,
        ]);

        $marca = Marca::create([
            'infonegocio_id' => $infonegocio->id,
            'user_id' => auth()->id(),
            // 'fecha' => $this->fecha,
            // 'n_oc' => $this->oc,
            'precio_venta' => $this->precio, //! obligatorio varchar
            // 'adjunto_cotizacion' => $this->cotizacion,
            'tipo_contrato' => $this->soluciones, //! obligatorio
            'linea' => $this->linea, //! obligatorio
            'codigo_linea' => $this->codlinea, //! obligatorio
            'nombre' => $this->nomgerente, //! obligatorio
            // 'telefono' => $this->telgerente,
            'correo_electronico' => $this->corgerente, //! obligatorio

            'otro' => $this->clientcode, //! nulo varchar
            'cel' => $this->clientname, //! nulo tipo numerico
            'email' => $this->mail, //! nulo tipo email

            'director' => $this->director, //! obligatorio vacrhar
            // 'numero' => $this->tel2gerente,
            'correo_director' => $this->cor2gerente, //! obligatorio tipo correo

            // 'cod_ejc' => $this->cod_ejc,
            'nombre_ejc' => $this->EjecutivoName,
            // 'telefono_ejc' => $this->telefono_ejc,
            'email_ejc' => $this->EjecutivoEmail,

            'tipo_solicitud' => $this->tipo_solicitud,
        ]);

        $this->marcaId = $marca->id;

        $informacion = Informacion::create([
            'marcas_id' => $this->marcaId,
            'realiza_entrega_cliente' => $this->entregacliente, //! obligatorio varchar
            'entrega_realizar' => $this->entrega_realizar,
            'lugar_entrega' => $this->lugarentrega, //! obligatorio varchar
            'pais' => $this->espais, //! obligatorio varchar
            'tiempo_entrega' => $this->tiempoentrega, //!  obligatorio
            'fecha_inicio_termino' => $this->terminoentrega, //! obligatorio
            'tipo_incoterms' => $this->tipoicoterm, //! obligatorio
            'servicio_a_prestar' => $this->prestar, //! obligatorio
            'frecuencia_suministro' => $this->suministrar, //! obligatorio
            'fecha_inicio' => $this->inicio, //!cobligatorio
            'fecha_finalizacion' => $this->finalizacion, //! obligatorio
        ]);

        Producto::create([
            'informacion_id' => $informacion->id,
            'aplica_garantia' => $this->aplicagarantia, //! obligatorio
            'termino_garantia' => $this->terminogarantia, //! obligatorio
            'aplica_poliza' => $this->aplicapoliza, //! obligatorio
            'porcentaje_poliza' => $this->porcentaje, //! obligatorio tipo porcentaje sin acpetar valores negativos
        ]);

        Pago::create([
            'marcas_id' => $this->marcaId,
            'incluye_iva' => $this->incluye_iva,
        ]);

        Financiera::create([
            'marcas_id' => $this->marcaId,
            'otros' => $this->otros,
        ]);

        $this->operacionesLink = (string) Str::uuid();
        $this->financieraLink = (string) Str::uuid();

        $expirationTime = Carbon::now()->addMinutes(5);

        DB::table('form_links')->insert([
            [
                'link' => $this->operacionesLink,
                'type' => 'operaciones',
                'marca_id' => $marca->id,
                'cliente' => $this->negocio,
                'nombre' => $this->nombre,
                'crm' => $this->crm,
                // 'forma_pago' => $this->formapago,
                // 'moneda' => $this->moneda,
                // 'otros' => $this->otros,
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
                // 'forma_pago' => $this->formapago,
                // 'moneda' => $this->moneda,
                // 'otros' => $this->otros,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'expires_at' => $expirationTime,
            ],
        ]);

        foreach ($this->files as $file) {
            $storedPath = $file['file']->store('documents', 'public');

            Documento::create([
                'marcas_id' => $this->marcaId,
                'nombre_original' => $file['name'],
                'ruta_documento' => $storedPath,
            ]);
        }

        // if ($this->cotizacion) {
        //     $originalName = $this->cotizacion->getClientOriginalName();
        //     $path = $this->cotizacion->storeAs('public/cotizacion', $originalName);


        //     $marca->update([
        //         'adjunto_cotizacion' => $path,
        //     ]);
        // }

        $this->attachments = array_values($this->files);
        $this->documentos = Documento::where('marcas_id', $this->marcaId)->get();

        $this->mmd = true;

        $operacionesUrl = url("formulario-operaciones/{$this->operacionesLink}");
        $financieraUrl = url("formulario-financiera/{$this->financieraLink}");

        $expirationTimeFormatted = $expirationTime->format('H:i');
        session()->flash('message', "Formulario enviado correctamente. Enlaces generados (expiran a las {$expirationTimeFormatted}):");
        session()->flash('operacionesUrl', $operacionesUrl);
        session()->flash('financieraUrl', $financieraUrl);
    }

    public function updatedAplicagarantia($value)
    {
        // Si la garantía es "sí", hacer que el término de garantía sea obligatorio
        if ($value === 'si') {
            $this->rules['terminogarantia'] = 'required|string|min:3';
        } else {
            $this->rules['terminogarantia'] = 'nullable';
            // $this->terminogarantia = ''; // Resetear el campo si selecciona "No"
        }
    }

    public function updatedPorcentaje($value)
    {
        // Si la garantía es "sí", hacer que el término de garantía sea obligatorio
        if ($value === 'si') {
            $this->rules['porcentaje'] = 'required|numeric|min:1';
        } else {
            $this->rules['porcentaje'] = 'nullable';
            // $this->terminogarantia = ''; // Resetear el campo si selecciona "No"
        }
    }
    public function cerrarmodal()
    {
        $this->dispatch('reloadPage');
    }

    public function mount()
    {
        $this->files = [];

        $colaborador = Colaborador::where('mail', auth()->user()->email)->first();

        if ($colaborador) {
            $this->nomgerente = $colaborador->nombre_colaborador;
            $this->corgerente = $colaborador->mail;

            $director = $colaborador->director;

            if ($director) {
                $this->director = $director->nombre_director;
                $this->cor2gerente = $director->mail;
            }
        }

        $this->Ejecutivos = Executive::all();
        $this->Lineas = Linea::all();
    }

    public function updateEjecutivoEmail()
    {
        $ejecutivo = Executive::find($this->selectedEjecutivo);
        // dd($ejecutivo);
        if ($ejecutivo) {
            $this->EjecutivoEmail = $ejecutivo->mail;
            $this->EjecutivoName = $ejecutivo->nombre_colaborador;
        } else {
            $this->EjecutivoEmail = '';
            $this->EjecutivoName = '';
        }
    }

    public function updatedSelectedCodigo()
    {
        $linea = Linea::find($this->selectedCodigo);
        // dd($linea);

        if ($linea) {
            $this->codlinea = $linea->codigo_linea;
            $this->linea = $linea->linea;
        } else {
            $this->codlinea = '';
            $this->linea = '';
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
        // $this->validate([
        //     'attachments.*' => 'file|max:10240|mimes:pdf,doc,docx,xls,xlsx,msj,msg',
        // ]);
        $this->files[] = []; // Resetear archivos antes de agregar nuevos
        foreach ($this->attachments as $id => $file) {
            $this->files[$id] = [
                'file' => $file,
                'name' => $file->getClientOriginalName(),
                'size' => round($file->getSize() / 1024, 2),
            ];
        }
    }

    public function dragOver()
    {
        $this->dragging = true;
    }

    public function dragLeave()
    {
        $this->dragging = false;
    }

    public function mounts($operacionesLink, $financieraLink)
    {
        $this->operacionesLink = $operacionesLink;
        $this->financieraLink = $financieraLink;
    }

    public function copyToClipboard($text)
    {
        $this->dispatchBrowserEvent('copyToClipboard', ['text' => $text]);
        session()->flash('link', 'Enlace copiado al portapapeles');
    }

    public function render()
    {
        return view('livewire.enviar-formulario', [
            'currentStep' => $this->currentStep,
            'operacionesLink' => $this->operacionesLink,
            'financieraLink' => $this->financieraLink,
            // 'directors' => $this->directors,
        ]);
    }
}
