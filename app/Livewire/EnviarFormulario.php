<?php

namespace App\Livewire;

use App\Models\Codigo;
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
        'files' => 'required|array|min:1', // antes 'attachments'

        //* Infonegocio
        'tipo_solicitud' => 'required',
        'negocio' => 'required|numeric|min:5',
        'nombre' => 'required|string|min:5',
        'correo' => 'required|email',
        'numero' => 'required|numeric',
        'crm' => 'required|numeric|unique:infonegocio,n_oportunidad_crm',

        //* Marca
        'precio' => 'required|numeric|min:1',
        'soluciones' => 'required|string|min:5',
        'linea' => 'required|string|min:5',
        'codlinea' => 'required|string',
        'nomgerente' => 'required|string|min:5',
        'nom_rep' => 'required|string',
        'corgerente' => 'required|email',
        'director' => 'required|string|min:5',
        'cor2gerente' => 'required|email',

        // Opcionales en Marca
        'clientcode' => 'nullable|string',
        'clientname' => 'nullable|numeric',
        'mail' => 'nullable|email',
        'EjecutivoEmail' => 'nullable|email',

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
        'aplicagarantia' => 'required|in:si,no',
        'terminogarantia' => 'required_if:aplicagarantia,si|string|min:1',
        'aplicapoliza' => 'required|in:si,no',
        'porcentaje' => 'required_if:aplicapoliza,si|numeric|min:0|max:100',

        //* Pago
        'incluye_iva' => 'required|in:1,0',
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

        'incluye_iva.required' => 'Debe especificar si incluye IVA.',
        'incluye_iva.in' => 'El campo debe ser Sí (1) o No (0).',

        'terminogarantia.required_if' => 'Debe especificar el término de la garantía.',
        'porcentaje.required_if' => 'Debe especificar el porcentaje de póliza.',
        'porcentaje.numeric' => 'El porcentaje debe ser numérico.',
        'porcentaje.min' => 'El porcentaje no puede ser menor que 0.',
        'porcentaje.max' => 'El porcentaje no puede ser mayor que 100.',

        'files.required' => 'Debe adjuntar al menos un documento.',
        'files.array' => 'Los documentos deben estar en formato válido.',
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

    public function updatedNegocio()
    {
        $cliente = Codigo::where('codigo_cliente', $this->negocio)->first();

        if ($cliente) {
            $this->nombre = $cliente->nombre_cliente;
        } else {
            $this->nombre = null;
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
