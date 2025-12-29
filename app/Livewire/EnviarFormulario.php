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
use App\Models\Director;
use App\Models\Marca;
use App\Models\Pago;
use App\Models\Producto;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\TextPart;

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
    public $linea = null;
    public $codlinea = '';
    public $nomgerente;
    // public $telgerente;
    public $corgerente;
    public $director;
    // public $tel2gerente;
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

    public $Directores = [];
    public $selectedDirector = null;
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
    public $entrega_realizar;
    public $mmd = false;
    public $Ejecutivos;
    public $Lineas;
    public $selectedEjecutivo = null;
    public $EjecutivoEmail = '';
    public $EjecutivoName = '';
    public $DirectorName = '';
    public $selectedCodigo = null;
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
        'files.*.file' => 'required|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg',

        //* Infonegocio
        'tipo_solicitud' => 'required',
        'negocio' => 'required|numeric|min:1',
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

        //* Información
        'entregacliente' => 'required|string|min:5',
        'entrega_realizar' => 'required|string|min:5',
        'lugarentrega' => 'required|string|min:5',
        'espais' => 'required|string|min:5',
        'tiempoentrega' => 'required|string|min:3',
        'terminoentrega' => 'required|date',
        'tipoicoterm' => 'required|string|min:2',
        'prestar' => 'nullable|string|min:4',
        'suministrar' => 'nullable|string|min:5',
        'inicio' => 'nullable|date',
        'finalizacion' => 'nullable|date',

        //* Producto
        'aplicagarantia' => 'required|in:si,no',
        'terminogarantia' => 'nullable|required_if:aplicagarantia,si|string|min:1',
        'aplicapoliza' => 'required|in:si,no',
        'porcentaje' => 'nullable|numeric|min:0|max:100',
        'incluye_iva' => 'boolean|required|in:0,1',
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
        //'hay_anticipo.boolean' => 'El campo "Hay anticipo" debe ser verdadero o falso.',

        // Campos de anticipo
        //'porcentaje_anticipo.numeric' => 'El porcentaje de anticipo debe ser un número y no puede ser menor a 0.',
        //'porcentaje_anticipo.min' => 'El porcentaje de anticipo no puede ser menor a 0.',
        'fecha_pago_anticipo.date' => 'La fecha del anticipo debe ser una fecha válida.',
        //'incluir_iva.boolean' => 'El campo "Incluir IVA" debe ser verdadero o falso.',

        // Otros
        'otros_pago.string' => 'El campo "Otros" debe contener texto.',

        'files.required' => 'Debe adjuntar al menos un documento.',
        'files.array' => 'Los documentos deben estar en formato válido.',
        'files.*.name' => 'Los nombres de los archivos no deben superar los 50 caracteres.',
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
        try {
            // ✅ Validaciones
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $mensajes = [];
            foreach ($e->errors() as $campo => $errores) {
                $mensajes[] = ucfirst($campo) . ': ' . implode(', ', $errores);
            }

            $mensaje = "Por favor corrija los siguientes campos:<br>" . implode('<br>', $mensajes);

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
            ]);

            // ✅ Crear Marca
            $marca = Marca::create([
                'infonegocio_id' => $infonegocio->id,
                'user_id' => auth()->id(),
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
            ]);

            $this->marcaId = $marca->id;

            // ✅ Crear Información
            $informacion = Informacion::create([
                'marcas_id' => $this->marcaId,
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

            // ✅ Crear Producto
            Producto::create([
                'informacion_id' => $informacion->id,
                'aplica_garantia' => $this->aplicagarantia,
                'termino_garantia' => $this->terminogarantia,
                'aplica_poliza' => $this->aplicapoliza,
                'porcentaje_poliza' => $this->porcentaje,
            ]);

            // ✅ Crear Pago
            Pago::create([
                'marcas_id' => $this->marcaId,
                'incluye_iva' => $this->incluye_iva ?? 0,
            ]);

            // ✅ Crear Financiera
            Financiera::create([
                'marcas_id' => $this->marcaId,
                'otros' => $this->otros,
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

                    $safeName = Str::limit($file['name'], 50, '');
                    $storedPath = $file['file']->store('documents', 'public');

                    Documento::create([
                        'marcas_id' => $this->marcaId,
                        'nombre_original' => $safeName,
                        'ruta_documento' => $storedPath,
                    ]);
                }
            }

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

            Mail::send([], [], function ($message) use ($email, $cliente, $codigo, $oportunidad, $gerente) {
                // 1) Prepara destinatario / asunto
                $message->to($email)
                    ->subject("CRM: {$oportunidad} - Nuevo Formulario de Oferta Mercantil Enviado");

                // 2) Embebe y captura los CIDs que devuelve embed()
                $cidBanner      = $message->embed(public_path('images/sign/banner.jpg'));
                $cidSiguenos    = $message->embed(public_path('images/sign/siguenos.png'));
                $cidFacebook    = $message->embed(public_path('images/sign/facebook.png'));
                $cidInstagram   = $message->embed(public_path('images/sign/instagram.png'));
                $cidLinkedin    = $message->embed(public_path('images/sign/linkedin.png'));
                $cidX           = $message->embed(public_path('images/sign/x.png'));

                // 3) Renderiza la vista pasándole los CIDs (la vista debe usar las variables)
                $firma = view('sign.firma', [
                    'cidBanner'    => $cidBanner,
                    'cidSiguenos'  => $cidSiguenos,
                    'cidFacebook'  => $cidFacebook,
                    'cidInstagram' => $cidInstagram,
                    'cidLinkedin'  => $cidLinkedin,
                    'cidX'         => $cidX,
                ])->render();

                // 4) Crea el body principal (incluye la firma ya renderizada)
                $body = "
                <!DOCTYPE html>
                <html>
                <head><meta charset='utf-8'></head>
                <body style='font-family: Arial, sans-serif;'>
                    <h2>Formulario de Oferta Mercantil Enviado</h2>
                    <p>Buen día,</p>
                    <p>Se ha enviado un nuevo formulario de oferta mercantil.</p>
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

            $expirationTimeFormatted = $expirationTime->format('H:i');
            session()->flash('message', "Formulario enviado correctamente. Enlaces generados.");
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
        }

        $this->Ejecutivos = Executive::all();
        $this->Lineas = Linea::all();
        $this->Directores = Director::all();
    }

    public function updateDirectorEmail()
    {
        $director = Director::find($this->selectedDirector);
        if ($director) {
            $this->DirectorEmail = $director->mail;
            $this->DirectorName = $director->nombre_director;
        }
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
    public function updatedCodlinea()
    {
        $codigo = trim((string) $this->codlinea);

        if ($codigo === '') {
            $this->linea = null;
            $this->selectedCodigo = null;
            return;
        }

        $linea = Linea::where('codigo_linea', $codigo)->first();

        if ($linea) {
            $this->linea = $linea->linea;   // nombre de la línea
            $this->selectedCodigo = $linea->id; // opcional
        } else {
            $this->linea = null;
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
                'max:10240', // máximo 5 MB
                function ($attribute, $value, $fail) {
                    $filename = $value->getClientOriginalName();
                    if (strlen(pathinfo($filename, PATHINFO_FILENAME)) > 45) {
                        $fail('El nombre del archivo no puede tener más de 45 caracteres.');
                    }
                },
            ],
        ]);
        foreach ($this->attachments as $file) {
            if ($file->isValid()) {
                $this->validate([
                    'attachments.*' => 'file|max:10240|mimes:pdf,doc,docx,xls,xlsx,msj,msg,eml',
                ]);
            }
        }

        $this->files = [];

        foreach ($this->attachments as $id => $file) {
            if ($file->isValid()) {
                $this->files[$id] = [
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
