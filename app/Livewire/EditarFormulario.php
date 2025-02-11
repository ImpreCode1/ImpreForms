<?php

namespace App\Livewire;

use App\Models\Documento;
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

    public $formulario;
    public $attachments = [];
    public $temporaryFiles = [];
    public $existingFiles = [];

    public $negocio, $nombres, $correo, $numero, $crms;
    public $fecha, $oc, $precio, $soluciones, $linea, $codlinea;
    public $nomgerente, $telgerente, $corgerente, $director, $tel2gerente, $cor2gerente;
    public $entregacliente, $lugarentrega, $espais, $tiempoentrega, $terminoentrega, $tipoicoterm;
    public $prestar, $suministrar, $inicio, $finalizacion;
    public $clientcode, $clientname, $mail, $details;
    public $aplicagarantia, $terminogarantia, $aplicapoliza, $porcentaje;
    public $formapago, $moneda, $incluye_iva, $fecha_pago, $otros;

    protected $listener = ['removeUpload'];
    public $marcaId;
    public $documentos;
    public $documento;
    public $files =[];

    protected $listeners = ['editFormulario'];


    protected $rules = [
        // validaciones

        'negocio' => 'required|numeric|',
        'nombres' =>  'required|string|',
        'correo' =>  'required|email|',
        'numero' => 'required|numeric',
        'crms' => 'required|string|',
        'fecha' => 'required|date',
        'oc' =>  'required|string|',
        'precio' =>  'required|numeric',
        'soluciones' => 'required|string|',
        'linea' => 'required|string|',
        'codlinea' => 'required|string|',
        'nomgerente' => 'required|string|',
        'telgerente' => 'required|numeric',
        'corgerente' => 'required|email|',
        'director' => 'required|string|',
        'tel2gerente' => 'required|numeric',
        'cor2gerente' => 'required|email|',
        'entregacliente' => 'required|string|',
        'lugarentrega' => 'required|string|',
        'espais' => 'required|string|',
        'tiempoentrega' => 'required|string|',
        'terminoentrega' => 'required|string|',
        'tipoicoterm' => 'required|string|max:255',
        'prestar' => 'required|string|',
        'suministrar' => 'required|string|',
        'inicio' => 'required|date',
        'finalizacion' => 'required|date',

        'clientname' => 'required|string|',
        'mail' => 'required|email|',
        'details' => 'required|string|',
        'aplicagarantia' => 'required|string|',
        'terminogarantia' => 'required|string|',
        'aplicapoliza' => 'required|string|',
        'porcentaje' => 'required|numeric',
        'formapago' => 'required|string|',
        'moneda' => 'required|string|',
        'incluye_iva' => 'required',
        'fecha_pago'  => 'required|date',
        'otros'  => 'string|',
    ];

    protected $messages = [

            'negocio.required' => 'El campo "Negocio" es obligatorio.',
            'negocio.numeric' => 'El campo "Negocio" debe ser un número.',
            'nombres.required' => 'El campo "Nombres" es obligatorio.',
            'nombres.string' => 'El campo "Nombres" debe ser una cadena de texto.',
            'correo.required' => 'El campo "Correo" es obligatorio.',
            'correo.email' => 'El campo "Correo" debe ser un correo electrónico válido.',
            'numero.required' => 'El campo "Número" es obligatorio.',
            'numero.numeric' => 'El campo "Número" debe ser un número.',
            'crms.required' => 'El campo "CRM" es obligatorio.',
            'crms.string' => 'El campo "CRM" debe ser una cadena de texto.',
            'fecha.required' => 'El campo "Fecha" es obligatorio.',
            'fecha.date' => 'El campo "Fecha" debe ser una fecha válida.',
            'oc.required' => 'El campo "OC" es obligatorio.',
            'oc.string' => 'El campo "OC" debe ser una cadena de texto.',
            'precio.required' => 'El campo "Precio" es obligatorio.',
            'precio.numeric' => 'El campo "Precio" debe ser un número.',
            'soluciones.required' => 'El campo "Soluciones" es obligatorio.',
            'soluciones.string' => 'El campo "Soluciones" debe ser una cadena de texto.',
            'linea.required' => 'El campo "Línea" es obligatorio.',
            'linea.string' => 'El campo "Línea" debe ser una cadena de texto.',
            'codlinea.required' => 'El campo "Código de línea" es obligatorio.',
            'codlinea.string' => 'El campo "Código de línea" debe ser una cadena de texto.',
            'nomgerente.required' => 'El campo "Nombre del Gerente" es obligatorio.',
            'nomgerente.string' => 'El campo "Nombre del Gerente" debe ser una cadena de texto.',
            'telgerente.required' => 'El campo "Teléfono del Gerente" es obligatorio.',
            'telgerente.numeric' => 'El campo "Teléfono del Gerente" debe ser un número.',
            'corgerente.required' => 'El campo "Correo del Gerente" es obligatorio.',
            'corgerente.email' => 'El campo "Correo del Gerente" debe ser un correo electrónico válido.',
            'director.required' => 'El campo "Director" es obligatorio.',
            'director.string' => 'El campo "Director" debe ser una cadena de texto.',
            'tel2gerente.required' => 'El campo "Teléfono 2 del Gerente" es obligatorio.',
            'tel2gerente.numeric' => 'El campo "Teléfono 2 del Gerente" debe ser un número.',
            'cor2gerente.required' => 'El campo "Correo 2 del Gerente" es obligatorio.',
            'cor2gerente.email' => 'El campo "Correo 2 del Gerente" debe ser un correo electrónico válido.',
            'entregacliente.required' => 'El campo "Entrega Cliente" es obligatorio.',
            'entregacliente.string' => 'El campo "Entrega Cliente" debe ser una cadena de texto.',
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
            'clientname.required' => 'El campo "Nombre del Cliente" es obligatorio.',
            'clientname.string' => 'El campo "Nombre del Cliente" debe ser una cadena de texto.',
            'mail.required' => 'El campo "Correo del Cliente" es obligatorio.',
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
            'porcentaje.numeric' => 'El campo "Porcentaje" debe ser un número.',
            'formapago.required' => 'El campo "Forma de Pago" es obligatorio.',
            'formapago.string' => 'El campo "Forma de Pago" debe ser una cadena de texto.',
            'moneda.required' => 'El campo "Moneda" es obligatorio.',
            'moneda.string' => 'El campo "Moneda" debe ser una cadena de texto.',
            'incluye_iva.required' => 'Este espacio es requerido.',
            'fecha_pago.required' => 'El campo "Fecha de Pago" es obligatorio.',
            'fecha_pago.date' => 'El campo "Fecha de Pago" debe ser una fecha válida.',
            'otros.string' => 'El campo "Otros" debe ser una cadena de texto.'
    ];


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

    private function handleFileUpload($file)
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

    public function removeUpload($index)
    {
        if (isset($this->temporaryFiles[$index])) {

            Storage::disk('public')->delete($this->temporaryFiles[$index]['path']);

            // Remove from array
            unset($this->temporaryFiles[$index]);
            $this->temporaryFiles = array_values($this->temporaryFiles);
        }
    }

    public function mount($formulario,)
    {
        // $this->marcaId = $marcaId;
        // $this->obtenerDocumentos();

        $this->formulario = $formulario;
        $this->negocio = $formulario->infonegocio->codigo_cliente;
        $this->nombres = $formulario->infonegocio->nombre;
        $this->correo = $formulario->infonegocio->correo;
        $this->numero = $formulario->infonegocio->numero_celular;
        $this->crms = $formulario->infonegocio->n_oportunidad_crm;

        $this->fecha = $this->formatearFecha($formulario->fecha);
        $this->oc = $formulario->n_oc;
        $this->precio = $formulario->precio_venta;
        $this->soluciones = $formulario->tipo_contrato;
        $this->linea = $formulario->linea;
        $this->codlinea = $formulario->codigo_linea;
        $this->nomgerente = $formulario->nombre;
        $this->telgerente = $formulario->telefono;
        $this->corgerente = $formulario->correo_electronico;

        $this->clientcode = $formulario->otro;
        $this->clientname = $formulario->cel;
        $this->mail = $formulario->email;

        $this->director = $formulario->director;
        $this->tel2gerente = $formulario->numero;
        $this->cor2gerente = $formulario->correo_director;
                $this->marcaId = $formulario->id;
        if ($formulario->informacion->isNotEmpty()) {
            $info = $formulario->informacion->first();
            $this->entregacliente = $info->realiza_entrega_cliente;
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
                $this->details = $producto->detalles_equipos;
                $this->aplicagarantia = $producto->aplica_garantia;
                $this->terminogarantia = $producto->termino_garantia;
                $this->aplicapoliza = $producto->aplica_poliza;
                $this->porcentaje = $producto->porcentaje_poliza;
            }
        }

        if ($formulario->pago && $formulario->pago->isNotEmpty()) {
            $pago = $formulario->pago->first();
            $this->fecha_pago = $this->formatearFecha($pago->fecha_pago);
            $this->incluye_iva = $pago->incluye_iva;
            // dd($formulario->pago);
        }

        if ($formulario->financiera->isNotEmpty()) {
            $financiera = $formulario->financiera->first();
            $this->formapago = $financiera->forma_pago;
            $this->moneda = $financiera->moneda;
            $this->otros = $financiera->otros;
        }

        $this->existingFiles = $formulario->documento->map(function($documento) {
            return [
                'id' => $documento->id,
                'name' => $documento->nombre_original,
                'path' => $documento->ruta_documento,
                'tipo' => $documento->tipo_documento
            ];
        })->toArray();
    }


    public function removeExistingFile($documentId)
    {
        $documento = Documento::find($documentId);
        if ($documento) {
            Storage::disk('public')->delete($documento->ruta_documento);
            $documento->delete();
            $this->existingFiles = array_filter($this->existingFiles, function($file) use ($documentId) {
                return $file['id'] != $documentId;
            });
        }
    }

    public function submit()
    {
        $this->validate();
        $this->formulario->update([
            'n_oc' => $this->oc,
            'fecha' => $this->fecha,
            'precio_venta' => $this->precio,
            'tipo_contrato' => $this->soluciones,
            'linea' => $this->linea,
            'codigo_linea' => $this->codlinea,
            'nombre' => $this->nomgerente,
            'telefono' => $this->telgerente,
            'correo_electronico' => $this->corgerente,
            'otro' => $this->clientcode,
            'cel' => $this->clientname,
            'email' => $this->mail,
            'director' => $this->director,
            'numero' => $this->tel2gerente,
            'correo_director' => $this->cor2gerente


        ]);

        // Actualizar información del negocio
        $this->formulario->infonegocio()->update([
            'codigo_cliente' => $this->negocio,
            'nombre' => $this->nombres,
            'correo' => $this->correo,
            'numero_celular' => $this->numero,
            'n_oportunidad_crm' => $this->crms
        ]);

        // Actualizar información
        if ($info = $this->formulario->informacion->first()) {

            $info->update([
                'realiza_entrega_cliente' => $this->entregacliente,
                'lugar_entrega' => $this->lugarentrega,
                'pais' => $this->espais,
                'tiempo_entrega' => $this->tiempoentrega,
                'fecha_inicio_termino' => $this->terminoentrega,
                'tipo_incoterms' => $this->tipoicoterm,
                'servicio_a_prestar' => $this->prestar,
                'frecuencia_suministro' => $this->suministrar,
                'fecha_inicio' => $this->inicio,
                'fecha_finalizacion' => $this->finalizacion
            ]);

            // Actualizar producto
            if ($producto = $info->producto->first()) {
                $producto->update([
                    'detalles_equipos' => $this->details,
                    'aplica_garantia' => $this->aplicagarantia,
                    'termino_garantia' => $this->terminogarantia,
                    'aplica_poliza' => $this->aplicapoliza,
                    'porcentaje_poliza' => $this->porcentaje
                ]);
            }
        }
        // Actualizar pago
        if ($pago = $this->formulario->pago->first()) {
            $pago->update([
                'fecha_pago' => $this->fecha_pago,
                'incluye_iva' => $this->incluye_iva
            ]);
        }
        // Actualizar información financiera
        if ($financiera = $this->formulario->financiera->first()) {
            $financiera->update([
                'forma_pago' => $this->formapago,
                'moneda' => $this->moneda,
                'otros' => $this->otros
            ]);
        }
        foreach ($this->attachments as $file) {
            $originalName = $file->getClientoriginalName();
            $path = $file->storeAs('documents',$originalName, 'public');
                Documento::create([
                'nombre_original' => $originalName,
                'marcas_id' => $this->marcaId,
                'ruta_documento' => $path,
            ]);
        }
        $this->documentos = Documento::where('marcas_id', $this->marcaId)->get();
        // return redirect()->route('formularios.index');
        $this->dispatch('formularioUpdated');
        return redirect()->route('historial');
        // $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.editar-formulario');
    }
}
