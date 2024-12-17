<?php

namespace App\Livewire;

use Livewire\Component;

class Formulariofinanciera extends Component
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
        return view('livewire.formulariofinanciera');
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

}
