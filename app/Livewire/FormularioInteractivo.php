<?php

namespace App\Livewire;

use Livewire\Component;

class FormularioInteractivo extends Component
{
    public $cliente;

    public $icoterm;
    public  $lugar;
    public $puerto;
    public $pais;
    public $entrega;
    public $transporte;
    public $origen;
    public $destino;
    public $entregalocal;
    protected $rules = [
        'cliente'=> 'required|string|min:5',

        'icoterm'=> 'required|string|min:5',
        'lugar'=> 'required|string|min:5',
        'puerto'=> 'required|string|min:5',
        'pais'=> 'required|string|min:5',
        'entrega'=> 'required|string|min:5',
        'transporte'=> 'required|string|min:5',
        'origen'=> 'required|string|min:5',
        'destino'=> 'required|string|min:5',
        'entregalocal'=> 'required|string|min:5',
    ];

    protected $messages = [
        'icoterm.required' => 'El espacio es requerido.',
        'icoterm.min' => 'El espacio debe tener mínimo 3 caracteres.',
        'cliente.required' => 'El espacio es requerido.',
        'lugar.required' => 'El espacio es requerido.',
        'puerto.required' => 'El espacio es requerido.',
        'pais.required' => 'El espacio es requerido.',
        'entrega.required' => 'El espacio es requerido.',
        'transporte.required' => 'El espacio es requerido.',
        'origen.required' => 'El espacio es requerido.',
        'destino.required' => 'El espacio es requerido.',
        'entregalocal.required' => 'El espacio es requerido.',



    ];

    public $currentStep = 1;

    public function changeStep($step)
    {
        $this->currentStep = $step;
    }

    public function getProgressWidth($fromStep, $toStep)
    {
        return $this->currentStep > $fromStep ? '100%' : '0%';
    }

    public function getStepIconClasses($stepNumber)
    {
        $baseClasses = "step-icon w-10 h-10 rounded-full flex items-center justify-center";

        if ($this->currentStep > $stepNumber) {
            return $baseClasses . " bg-indigo-500 text-white";
        } elseif ($this->currentStep == $stepNumber) {
            return $baseClasses . " bg-indigo-500 text-white";
        } else {
            return $baseClasses . " bg-gray-200 text-gray-500";
        }
    }

    public function submit()
    {
        $this->validate();

        // Lógica de envío de formulario
    }

    public function render()
    {
        return view('livewire.formulario-interactivo', [
            'currentStep' => $this->currentStep
        ]);
    }
}
