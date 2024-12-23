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
        'nombre' => 'required|string|min:2',
        'correo' => 'required|string|min:2',
        'numero' => 'required|int|min:2',
        'crm' => 'required|string|min:2',
        'fecha' => 'required|string|min:2',
        'oc' => 'required|string|min:2',
        'precio' => 'required|string|min:2',
        'cotizacion' => 'required|string|min:2',
        'soluciones' => 'required|string|min:2',
        'linea' => 'required|string|min:2',
        'codlinea' => 'required|string|min:2',
        'nomgerente' => 'required|string|min:2',
        'telgerente' => 'required|int|min:2',
        'corgerente' => 'required|string|min:2',
        'director' => 'required|string|min:2',
        'tel2gerente' => 'required|int|min:2',
        'cor2gerente' => 'required|string|min:2',
        'entregacliente' => 'required|string|min:2',
        'lugarentrega' => 'required|string|min:2',
        'espais' => 'required|string|min:2',
        'tiempoentrega' => 'required|string|min:2',
        'terminoentrega' => 'required|string|min:2',
        'tipoicoterm' => 'required|string|min:2',
        'prestar' => 'required|string|min:2',
        'suministrar' => 'required|string|min:2',
        'inicio' => 'required|string|min:2',
        'finalizacion' => 'required|string|min:2',
        'details' => 'required|string|min:2',
        'aplicagarantia' => 'required|string|min:2',
        'terminogarantia' => 'required|string|min:2',
        'formapago' => 'required|string|min:2',
        'moneda' => 'required|string|min:2',
        'iva' => 'required|string|min:2',
        'other' => 'required|string|min:2',
        'actualpago' => 'required|string|min:2',
        'monedaactual' => 'required|string|min:2',
        'porcentaje' => 'required|int',
        'aplicapoliza' => 'required|string|min:2',


    ];

    protected $messages = [
        'negocio.required' => 'El espacio es requerido.',
        'negocio.min' => 'El espacio debe tener mínimo 5 caracteres.',
        'nombre.required' =>'El espacio es requerido.',
        'correo.required' =>'El espacio es requerido.',
        'numero.required' =>'El espacio es requerido.',
        'crm.required' =>'El espacio es requerido.',
        'fecha.required' =>'El espacio es requerido.',
        'oc.required' =>'El espacio es requerido.',
        'precio.required'=>'El espacio es requerido.',
        'cotizacion.required' =>'El espacio es requerido.',
        'soluciones.required' =>'El espacio es requerido.',
        'linea.required' =>'El espacio es requerido.',
        'codlinea.required' =>'El espacio es requerido.',
        'nomgerente.required' =>'El espacio es requerido.',
        'telgerente.required' =>'El espacio es requerido.',
        'corgerente.required' =>'El espacio es requerido.',
        'director.required' =>'El espacio es requerido.',
        'tel2gerente.required' =>'El espacio es requerido.',
        'cor2gerente.required' =>'El espacio es requerido.',
        'entregacliente.required' =>'El espacio es requerido.',
        'lugarentrega.required' =>'El espacio es requerido.',
        'espais.required' =>'El espacio es requerido.',
        'tiempoentrega.required'  =>'El espacio es requerido.',
        'terminoentrega.required' =>'El espacio es requerido.',
        'tipoicoterm.required' =>'El espacio es requerido.',
        'prestar.required' =>'El espacio es requerido.',
        'suministrar.required' =>'El espacio es requerido.',
        'inicio.required' =>'El espacio es requerido.',
        'finalizacion.required' =>'El espacio es requerido.',
        'details.required' =>'El espacio es requerido.',
        'aplicagarantia.required' =>'El espacio es requerido.',
        'terminogarantia.required' =>'El espacio es requerido.',
        'formapago.required' =>'El espacio es requerido.',
        'moneda.required' =>'El espacio es requerido.',
        'iva.required' =>'El espacio es requerido.',
        'other.required' =>'El espacio es requerido.',
        'actualpago.required' =>'El espacio es requerido.',
        'monedaactual.required '=>'El espacio es requerido.',
        'porcentaje.required' =>'El espacio es requerido.',
        'aplicapoliza.required' =>'El espacio es requerido.',



        'nombre.min'=> 'El espacio debe tener como minimo 2 caracteres.',
        'correo.min'=>'El espacio debe tener como minimo 2 caracteres.',
        'numero.min'=>'El espacio debe ser completado solo con numeros',
        'crm.min'=>'El espacio debe tener como minimo 2 caracteres.',
        'fecha.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'oc.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'precio.min'=>'El espacio debe tener como minimo 2 caracteres.',
        'cotizacion.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'soluciones.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'linea.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'codlinea.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'nomgerente.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'telgerente.min' =>'El espacio debe ser completado solo con numeros',
        'corgerente.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'director.int' =>'El espacio debe tener como minimo 2 caracteres.',
        'tel2gerente.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'cor2gerente.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'entregacliente.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'lugarentrega.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'espais.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'tiempoentrega.min'  =>'El espacio debe tener como minimo 2 caracteres.',
        'terminoentrega.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'tipoicoterm.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'prestar.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'suministrar.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'inicio.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'finalizacion.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'details.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'aplicagarantia.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'terminogarantia.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'formapago.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'moneda.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'iva.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'other.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'actualpago.min' =>'El espacio debe tener como minimo 2 caracteres.',
        'monedaactual.min '=>'El espacio debe tener como minimo 2 caracteres.',
        'porcentaje.int' =>'El espacio debe ser completado solo con numeros',
        'aplicapoliza.min' =>'El espacio debe tener como minimo 2 caracteres.',




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
