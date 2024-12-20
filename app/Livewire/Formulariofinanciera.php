<?php

namespace App\Livewire;

use Livewire\Component;

class Formulariofinanciera extends Component
{
    public $currentStep = 1;
    public $hasAdvancePayment = null;
    public $advancePaymentPercentage = null;
    public $advancePaymentDate = null;
    public $poliza;
    public $plazo;
    public $pago;
    public $moneda;
    public $anticipo;
    public $fecha;
    public $garantia;
    public $otros;

    protected $messages = [
        'plazo.required' => 'El espacio es requerido',
        'plazo.min' => 'El espacio debe tener mínimo 5 caracteres',
        'pago.required' => 'El espacio es requerido.',
        'pago.min' => 'El espacio debe tener mínimo 5 caracteres',
        'moneda.required' => 'El espacio es requerido.',
        'fecha.required' => 'El espacio es requerido.',
        'fecha.date' => 'La fecha debe ser válida.',
        'anticipo.required' => 'El espacio es requerido.',
        'anticipo.min' => 'El anticipo debe tener mínimo 5 caracteres.',
        'garantia.required' => 'El espacio es requerido.',
    ];

    public function rules()
    {

        $rules = [
            'plazo' => 'required|string|min:5|max:50',
            'moneda' => 'required|string',
            'pago' => 'required|string|min:2',
            'garantia' => 'required|string'
        ];

        // Verifica si hay un pago anticipado
        if ($this->hasAdvancePayment !== 'no') {
            // Si hay un pago anticipado, el anticipo y la fecha son requeridos
            $rules['anticipo'] = 'required|string|min:5|max:50';
            $rules['fecha'] = 'required|date'; // Asegúrate de que la fecha sea válida
        } else {
            // Si no hay pago anticipado, se puede omitir la validación de los campos
            $rules['anticipo'] = 'nullable|string|min:5|max:50'; // Opcional o puedes evitar esta línea
            $rules['fecha'] = 'nullable|date'; // Opcional y debe ser válida si se proporciona
        }

        return $rules;
    }

    public function changeStep($step)
    {
        $this->currentStep = $step;
    }

    public function setAdvancePayment($value)
    {
        $this->hasAdvancePayment = $value;

        if ($value === 'no') {
            // Resetear otros campos si no hay pago anticipado
            $this->advancePaymentPercentage = null;
            $this->advancePaymentDate = null;
            $this->anticipo = null;
            $this->fecha = null;
        }
    }

    public function submit()
    {
        // Aquí llamamos a la validación antes de enviar o procesar los datos
        $this->validate();

        // Lógica de envío del formulario
        // ...
    }

    public function render()
    {
        return view('livewire.formulariofinanciera');
    }

    public function getStepIconClasses($stepNumber)
    {
        $baseClasses = "step-icon w-10 h-10 rounded-full flex items-center justify-center";

        if ($this->currentStep > $stepNumber) {
            return $baseClasses . " bg-indigo-500 text-white";
        } elseif ($this->currentStep === $stepNumber) {
            return $baseClasses . " bg-indigo-500 text-white";
        } else {
            return $baseClasses . " bg-gray-200 text-gray-500";
        }
    }
}
