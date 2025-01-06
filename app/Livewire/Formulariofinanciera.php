<?php

namespace App\Livewire;

use App\Models\Financiera;
use Livewire\Component;

class Formulariofinanciera extends Component
{
    public $currentStep = 1;
    public $hasAdvancePayment = null;
    public $advancePaymentPercentage = null;
    public $advancePaymentDate = null;
    public $poliza;
    public $plazo = '';
    public $pago;
    public $moneda;
    public $anticipo;
    public $fecha;
    public $garantia;
    public $otros;
    public $no;

    protected $messages = [
        'plazo.required' => 'El espacio es requerido',
        'plazo.min' => 'El espacio debe tener mínimo 2 caracteres',
        'pago.required' => 'El espacio es requerido.',
        'pago.min' => 'El espacio debe tener mínimo 2 caracteres',
        'moneda.min' => 'El espacio debe tener mínimo 2 caracteres',

        'moneda.required' => 'El espacio es requerido.',

        'fecha.required' => 'El espacio es requerido.',
        'fecha.date' => 'La fecha debe ser válida.',
        'anticipo.required' => 'El espacio es requerido.',
        'anticipo.min' => 'El anticipo debe tener mínimo 2 caracteres.',
        'garantia.required' => 'El espacio es requerido.',
        'garantia.min' => 'El espacio debe tener mínimo 2 caracteres',

        'no.required' => 'El espacio es requerido.',

    ];

    public function rules()
    {
        $rules = [
            'plazo' => 'required|string|min:2|max:50',
            'moneda' => 'required|string|min:2',
            'pago' => 'required|string|min:2',
            'garantia' =>'required|string|min:2',
            'no' => 'required|string',

        ];

        // Verifica si hay un pago anticipado
        if ($this->hasAdvancePayment !== 'no') {
            // Si hay un pago anticipado, el anticipo y la fecha son requeridos
            $rules['anticipo'] = 'nullable|numeric'; // Asegura que el anticipo sea numérico si se proporciona
            $rules['fecha'] = 'nullable|date'; // Asegúrate de que la fecha sea válida si se proporciona
        } else {
            // Si no hay pago anticipado, se puede omitir la validación de los campos
            $rules['anticipo'] = 'nullable|numeric'; // Opcional y debe ser numérico si se proporciona
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
        $this->validate();

        Financiera::create([
            'marcas_id' => 1,
            'plazo' => $this->plazo,
            'forma_pago' => $this->pago,
            'moneda' => $this->moneda,
            'garantiascredit' => $this->garantia,
            'existencia_anticipo' => $this->hasAdvancePayment ? 1 : 0,
            'porcentaje' => $this->anticipo,
            'fecha_pago' => $this->fecha,
            'otros' => $this->otros,

        ]);

        // $this->reset();

        $this->reset(['plazo', 'pago', 'moneda', 'garantia', 'hasAdvancePayment', 'anticipo', 'fecha', 'otros']);



    }

    public function render()
    {
        return view('livewire.formulariofinanciera');
    }

    public function getStepIconClasses($stepNumber)
    {
        $baseClasses = 'step-icon w-10 h-10 rounded-full flex items-center justify-center';

        if ($this->currentStep > $stepNumber) {
            return $baseClasses . ' bg-indigo-500 text-white';
        } elseif ($this->currentStep === $stepNumber) {
            return $baseClasses . ' bg-indigo-500 text-white';
        } else {
            return $baseClasses . ' bg-gray-200 text-gray-500';
        }
    }
}
