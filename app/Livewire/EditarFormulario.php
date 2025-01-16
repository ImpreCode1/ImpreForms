<?php

namespace App\Livewire;

use Carbon\Carbon;
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
    public $negocio, $nombres, $correo, $numero, $crms;
    public $fecha, $oc, $precio, $soluciones, $linea, $codlinea;
    public $nomgerente, $telgerente, $corgerente, $director, $tel2gerente, $cor2gerente;
    public $entregacliente, $lugarentrega, $espais, $tiempoentrega, $terminoentrega, $tipoicoterm;
    public $prestar, $suministrar, $inicio, $finalizacion;
    public $clientcode, $clientname, $mail, $details;
    public $aplicagarantia, $terminogarantia, $aplicapoliza, $porcentaje;
    public $formapago, $moneda, $incluye_iva, $fecha_pago, $otros;

    // protected $rules = [
    //     'formulario.codigo_cliente' => 'required|string',
    //     'formulario.tipo_contrato' => 'required|string',
    //     'formulario.n_oc' => 'required|string',
    //     'formulario.adjunto_cotizacion' => 'nullable|string',
    //     'formulario.fecha' => 'required|date',
    // ];

    protected $listeners = ['editFormulario'];

    public function mount($formulario)
    {
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
    }

    // public function editFormulario($formulario)
    // {
    //     $this->formulario = $formulario;

    //     // Datos del negocio
    //     $this->negocio = $formulario->infonegocio->codigo_cliente ?? null;
    //     $this->nombres = $formulario->infonegocio->nombre ?? null;
    //     $this->correo = $formulario->infonegocio->correo ?? null;
    //     $this->numero = $formulario->infonegocio->numero_celular ?? null;
    //     $this->crms = $formulario->infonegocio->n_oportunidad_crm ?? null;

    //     // Datos principales del formulario
    //     $this->fecha = $this->formatearFecha($formulario->fecha) ?? null;
    //     $this->oc = $formulario->n_oc ?? null;
    //     $this->precio = $formulario->precio_venta ?? null;
    //     $this->soluciones = $formulario->tipo_contrato ?? null;
    //     $this->linea = $formulario->linea ?? null;
    //     $this->codlinea = $formulario->codigo_linea ?? null;
    //     $this->nomgerente = $formulario->nombre ?? null;
    //     $this->telgerente = $formulario->telefono ?? null;
    //     $this->corgerente = $formulario->correo_electronico ?? null;

    //     // Datos adicionales del cliente
    //     $this->clientcode = $formulario->otro ?? null;
    //     $this->clientname = $formulario->cel ?? null;
    //     $this->mail = $formulario->email ?? null;

    //     // Datos del director
    //     $this->director = $formulario->director ?? null;
    //     $this->tel2gerente = $formulario->numero ?? null;
    //     $this->cor2gerente = $formulario->correo_director ?? null;

    //     // Información adicional
    //     if ($formulario->informacion->isNotEmpty()) {
    //         $info = $formulario->informacion->first();
    //         $this->entregacliente = $info->realiza_entrega_cliente ?? null;
    //         $this->lugarentrega = $info->lugar_entrega ?? null;
    //         $this->espais = $info->pais ?? null;
    //         $this->tiempoentrega = $info->tiempo_entrega ?? null;
    //         $this->terminoentrega = $this->formatearFecha($info->fecha_inicio_termino) ?? null;
    //         $this->tipoicoterm = $info->tipo_incoterms ?? null;
    //         $this->prestar = $info->servicio_a_prestar ?? null;
    //         $this->suministrar = $info->frecuencia_suministro ?? null;
    //         $this->inicio = $this->formatearFecha($info->fecha_inicio) ?? null;
    //         $this->finalizacion = $this->formatearFecha($info->fecha_finalizacion) ?? null;

    //         // Información del producto
    //         if ($info->producto->isNotEmpty()) {
    //             $producto = $info->producto->first();
    //             $this->details = $producto->detalles_equipos ?? null;
    //             $this->aplicagarantia = $producto->aplica_garantia ?? null;
    //             $this->terminogarantia = $producto->termino_garantia ?? null;
    //             $this->aplicapoliza = $producto->aplica_poliza ?? null;
    //             $this->porcentaje = $producto->porcentaje_poliza ?? null;
    //         }
    //     }

    //     // Información de pago
    //     if ($formulario->pago && $formulario->pago->isNotEmpty()) {
    //         $pago = $formulario->pago->first();
    //         $this->fecha_pago = $this->formatearFecha($pago->fecha_pago) ?? null;
    //         $this->incluye_iva = $pago->incluye_iva ?? null;
    //     }

    //     // Información financiera
    //     if ($formulario->financiera->isNotEmpty()) {
    //         $financiera = $formulario->financiera->first();
    //         $this->formapago = $financiera->forma_pago ?? null;
    //         $this->moneda = $financiera->moneda ?? null;
    //         $this->otros = $financiera->otros ?? null;
    //     }
    // }

    public function submit()
    {
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
