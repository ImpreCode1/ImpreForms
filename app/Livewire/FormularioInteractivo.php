<?php

namespace App\Livewire;

use Livewire\Component;

class FormularioInteractivo extends Component
{

    // TODO: Faltan validaciones.

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

    public function render()
    {
        return view('livewire.formulario-interactivo', [
            'currentStep' => $this->currentStep
        ]);
    }


}
