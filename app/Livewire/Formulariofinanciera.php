<?php

namespace App\Livewire;

use App\Models\Financiera;
use Carbon\Carbon;
use Illuminate\Cache\RedisLock;
use Illuminate\Cache\RedisStore;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Session;
class Formulariofinanciera extends Component
{

    public $cliente;
    public $nombre;
    public $crm;

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
    public $link;

    public $marcaId;
//mostrar el mensaje personalizado en caso de que el formulario no tenga todos los campos llenos
    public $errorMessage;

    public $success = false;
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

        'hasAdvancePayment.required' => 'El espacio es requerido.',

    ];

    public function rules()
    {
        $rules = [
            'plazo' => 'required|string|min:2|max:50',
            'moneda' => 'required|string|min:2',
            'pago' => 'required|string|min:2',
            'garantia' =>'required|string|min:2',
            'hasAdvancePayment' => 'required|string',

        ];

        //! Verifica si hay un pago anticipado
        if ($this->hasAdvancePayment !== 'no') {
            //! Si hay un pago anticipado, el anticipo y la fecha son requeridos
            $rules['anticipo'] = 'required|numeric'; //! Asegura que el anticipo sea numérico si se proporciona
            $rules['fecha'] = 'required|date'; //! Asegúrate de que la fecha sea válida si se proporciona
        } else {
            //! Si no hay pago anticipado, se puede omitir la validación de los campos
            $rules['anticipo'] = 'nullable|numeric'; //! Opcional y debe ser numérico si se proporciona
            $rules['fecha'] = 'nullable|date'; //! Opcional y debe ser válida si se proporciona
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
            //* Resetear otros campos si no hay pago anticipado
            $this->advancePaymentPercentage = null;
            $this->advancePaymentDate = null;
            $this->anticipo = null;
            $this->fecha = null;
        }
    }

    public function mount($link)
    {
        $this->link = $link;

        $record = DB::table('form_links')->where('link', $link)->where('type', 'financiera')->first();
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

        $financiera = Financiera::where('marcas_id', $this->marcaId)->first();
        if ($financiera) {

            $this->plazo = $financiera ->plazo;
            $this->pago = $financiera->forma_pago;
            $this->moneda = $financiera->moneda;
            $this->otros = $financiera->otros;
            $this->garantia =$financiera->garantiascredit;
            $this->anticipo = $financiera ->porcentaje;


        }
        if (Session::has('form_submited')){
            return redirect()->to('/successful');
        }
    }

    public function submit()
    {
        //TODO Validar los datos del formulario

        $DataValidate = $this->validate();

        //TODO Buscar si existe un registro de 'Financiera' para el 'marcas_id'

        $financiera = Financiera::where('marcas_id', $this->marcaId)->first();

        //TODO Si existe un registro, actualízalo

        if ($financiera) {
            $financiera->update([
                'plazo' => $this->plazo,
                'forma_pago' => $this->pago,
                'moneda' => $this->moneda,
                'garantiascredit' => $this->garantia,
                'existencia_anticipo' => $this->hasAdvancePayment ? 1 : 0,
                'porcentaje' => $this->anticipo,
                'fecha_pago' => $this->fecha,
                'otros' => $this->otros,


            ]);

            session()->flash('mensaje', 'Formulario actualizado correctamente.');
        } else {


            //TODO Si no existe el registro, puedes mostrar un mensaje o manejarlo de alguna manera


        session()->flash('mensaje', 'No se encontró el registro de financiera para actualizar.');
        }

        //TODO Establecer variable de sesión para indicar que el formulario fue enviado

        Session::put('form_submitted', true);

        //TODO Limpiar los campos del formulario en caso de que sea necesario
        //* En este caso no los limpio para que el usuario pueda ver la informacon anterior y poder editar

        // $this->reset(['plazo', 'pago', 'moneda', 'garantia', 'hasAdvancePayment', 'anticipo', 'fecha', 'otros']);

        //TODO Marcar como exitoso y redirigir

        $this->success = true;
        return redirect()->to('/successful');
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
