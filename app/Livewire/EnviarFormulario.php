<?php

namespace App\Livewire;

use Livewire\Component;

class EnviarFormulario extends Component
{
    public $currentStep = 1;



    public $hasAdvancePayment = null;
    public $advancePaymentPercentage = null;
    public $advancePaymentDate = null;
    public $negocio;
    public  $nombre;
    public  $correo;
    public  $numero;
    public  $crm;
    public  $fecha;
    public  $oc;
    public  $precio;
    public  $cotizacion;
    public  $soluciones;
    public  $linea;
    public  $codlinea;
    public  $nomgerente;
    public  $telgerente;
    public  $corgerente;
    public  $director;
    public  $tel2gerente;
    public  $cor2gerente;
    public  $entregacliente;
    public  $lugarentrega;
    public  $espais;
    public  $tiempoentrega;
    public  $terminoentrega;
    public  $tipoicoterm;
    public  $prestar;
    public  $suministrar;
    public  $inicio;
    public  $finalizacion;
    public  $details;
    public  $aplicagarantia;
    public  $terminogarantia;
    public  $formapago;
    public  $moneda;
    public  $iva;
    public  $other;
    public  $actualpago;
    public  $monedaactual;
    public  $porcentaje;
    public $aplicapoliza;
    protected $rules = [
        'negocio' => 'required|string|min:5',
        'nombre' => 'required|string|min:5',
        'correo' => 'required|string|min:5',
        'numero' => 'required|string|min:5',
        'crm' => 'required|string|min:5',
        'fecha' => 'required|string|min:5',
        'oc' => 'required|string|min:5',
        'precio' => 'required|string|min:5',
        'cotizacion' => 'required|string|min:5',
        'soluciones' => 'required|string|min:5',
        'linea' => 'required|string|min:5',
        'codlinea' => 'required|string|min:5',
        'nomgerente' => 'required|string|min:5',
        'telgerente' => 'required|string|min:5',
        'corgerente' => 'required|string|min:5',
        'director' => 'required|string|min:5',
        'tel2gerente' => 'required|string|min:5',
        'cor2gerente' => 'required|string|min:5',
        'entregacliente' => 'required|string|min:5',
        'lugarentrega' => 'required|string|min:5',
        'espais' => 'required|string|min:5',
        'tiempoentrega' => 'required|string|min:5',
        'terminoentrega' => 'required|string|min:5',
        'tipoicoterm' => 'required|string|min:5',
        'prestar' => 'required|string|min:5',
        'suministrar' => 'required|string|min:5',
        'inicio' => 'required|string|min:5',
        'finalizacion' => 'required|string|min:5',
        'details' => 'required|string|min:5',
        'aplicagarantia' => 'required|string|min:5',
        'terminogarantia' => 'required|string|min:5',
        'formapago' => 'required|string|min:5',
        'moneda' => 'required|string|min:5',
        'iva' => 'required|string|min:5',
        'other' => 'required|string|min:5',
        'actualpago' => 'required|string|min:5',
        'monedaactual' => 'required|string|min:5',
        'porcentaje' => 'required|string|min:5',
        'aplicapoliza' => 'required|string|min:5',


    ];

    protected $messages = [
        'negocio.required' => 'El espacio es requerido.',
        'negocio.min' => 'El espacio debe tener mínimo 5 caracteres.',




    ];
    public function changeStep($step)
    {
        $this->currentStep = $step;
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
    }
    public function render()
    {
        return view('livewire.enviar-formulario', [
            'currentStep' => $this->currentStep
        ]);
    }
}
