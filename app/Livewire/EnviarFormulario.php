<?php

namespace App\Livewire;

use Livewire\Component;

class EnviarFormulario extends Component
{
    public $currentStep = 1;



    public $hasAdvancePayment = null;
    public $advancePaymentPercentage = null;
    public $advancePaymentDate = null;

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

    public function render()
    {
        return view('livewire.enviar-formulario', [
            'currentStep' => $this->currentStep
        ]);
    }
}
