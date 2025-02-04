<?php

namespace App\Livewire;

use App\Models\Infoentrega;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class FormularioInteractivo extends Component
{
    public $cliente;
    public $nombre;
    public $crm;

    public $icoterm;
    public $lugar;
    public $puerto;
    public $pais;
    // public $entrega;
    public $transporte;
    public $origen;
    public $destino;
    public $entregalocal;
    public $clientes;
    public $fecha;
    public $link;
    public $marcaId;

    protected $rules = [
        'clientes' => 'required|string|min:3',

        'icoterm' => 'required|string|min:3',
        'lugar' => 'required|string|min:3',
        'puerto' => 'required|string|min:3',
        'pais' => 'required|string|min:3',
        // 'entrega'=> 'required|string|min:3',
        'transporte' => 'required|string|min:3',
        'origen' => 'required|string|min:3',
        'destino' => 'required|string|min:3',
        'entregalocal' => 'required|string|min:3',
    ];

    protected $messages = [
        'icoterm.required' => 'El espacio es requerido.',
        'icoterm.min' => 'El espacio debe tener mínimo 3 caracteres.',
        'clientes.required' => 'El espacio es requerido.',
        'clientes.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'lugar.required' => 'El espacio es requerido.',
        'lugar.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'puerto.required' => 'El espacio es requerido.',
        'puerto.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'pais.required' => 'El espacio es requerido.',
        'pais.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'transporte.required' => 'El espacio es requerido.',
        'transporte.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'origen.required' => 'El espacio es requerido.',
        'origen.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'destino.required' => 'El espacio es requerido.',
        'destino.min' => 'El espacio debe tener mínimo 3 caracteres.',

        'entregalocal.required' => 'El espacio es requerido.',
        'entregalocal.min' => 'El espacio debe tener mínimo 3 caracteres.',
    ];

    public function mount($link)
    {
        $this->link = $link;

        $record = DB::table('form_links')->where('link', $link)->where('type', 'operaciones')->first();
        if (!$record || Carbon::parse($record->created_at)->addMinutes(40)->isPast()) {
            abort(404, 'El enlace ha expirado o no es válido.');
        }

        $this->cliente = $record->cliente;
        $this->nombre = $record->nombre;
        $this->crm = $record->crm;
        $this->marcaId = $record->marca_id;

        if (is_null($this->marcaId)) {
            abort(500, 'Marca ID is null');
        }

        $infoEntrega = Infoentrega::where('marcas_id', $this->marcaId)->first();
        if  ($infoEntrega){
                $this -> marcaId = $infoEntrega -> marcas_id;
           $this ->clientes = $infoEntrega-> entrega_cliente;
           $this-> lugar = $infoEntrega->lugar_entrega;
            $this->pais = $infoEntrega->pais;
            $this-> puerto = $infoEntrega->puerto;
            $this -> icoterm = $infoEntrega->incoterm;
            $this-> transporte = $infoEntrega->transporte;
            $this   ->  origen = $infoEntrega->origen;
            $this -> destino = $infoEntrega -> destino;
            $this -> entregalocal = $infoEntrega->condiciones;



            }

    }

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
        $baseClasses = 'step-icon w-10 h-10 rounded-full flex items-center justify-center';

        if ($this->currentStep > $stepNumber) {
            return $baseClasses . ' bg-indigo-500 text-white';
        } elseif ($this->currentStep == $stepNumber) {
            return $baseClasses . ' bg-indigo-500 text-white';
        } else {
            return $baseClasses . ' bg-gray-200 text-gray-500';
        }
    }

    public function submit()
    {
        // Validar los datos antes de proceder
        $this->validate();

        // Buscar el registro existente en Infoentrega
        $infoEntrega = Infoentrega::where('marcas_id', $this->marcaId)->first();

        if ($infoEntrega) {
            // Si el registro ya existe, actualizarlo con los nuevos valores
            $infoEntrega->update([

                'entrega_cliente' => $this->clientes,
                'lugar_entrega' => $this->lugar,
                'pais' => $this->pais,
                'puerto' => $this->puerto,
                'incoterm' => $this->icoterm,
                'transporte' => $this->transporte,
                'origen' => $this->origen,
                'destino' => $this->destino,
                'condiciones' => $this->entregalocal


            ]);
        } else {
            // Si no se encuentra el registro, crear uno nuevo
            Infoentrega::create([
                'marcas_id' => $this->marcaId,
                'entrega_cliente' => $this->clientes,
                'lugar_entrega' => $this->lugar,
                'pais' => $this->pais,
                'puerto' => $this->puerto,
                'incoterm' => $this->icoterm,
                'transporte' => $this->transporte,
                'origen' => $this->origen,
                'destino' => $this->destino,
                'condiciones' => $this->entregalocal
            ]);
        }

        // Resetear los campos del formulario
        // $this->reset(['cliente', 'nombre', 'crm', 'icoterm', 'lugar', 'puerto', 'pais', 'transporte', 'origen', 'destino', 'entregalocal', 'clientes', 'link']);

        // Redirigir a la página de éxito
        return redirect()->to('/successful');

        // Despachar el evento de recarga y redirección (si es necesario)
        $this->dispatchBrowserEvent('reloadAndRedirect');
    }


    public function render()
    {
        return view('livewire.formulario-interactivo', [
            'currentStep' => $this->currentStep,
        ]);
    }
}
