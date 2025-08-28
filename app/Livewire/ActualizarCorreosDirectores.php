<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class ActualizarCorreosDirectores extends Component
{
    public $correo_operaciones;
    public $correo_financiera;
    public $correo_administrador;

    public function mount()
    {
        $this->correo_operaciones = Setting::where('key', 'director_operaciones_email')->value('value') ?? '';
        $this->correo_financiera = Setting::where('key', 'director_financiera_email')->value('value') ?? '';
        $this->correo_administrador = Setting::where('key', 'director_administrador_email')->value('value') ?? '';
    }

    public function guardarCorreos()
    {
        $this->validate([
            'correo_operaciones' => 'required|email',
            'correo_financiera' => 'required|email',
            'correo_administrador'=> 'required|email',
        ]);

        Setting::updateOrCreate(
            ['key' => 'director_operaciones_email'],
            ['value' => $this->correo_operaciones]
        );

        Setting::updateOrCreate(
            ['key' => 'director_financiera_email'],
            ['value' => $this->correo_financiera]
        );

        Setting::updateOrCreate(
            ['key' => 'director_administrador_email'],
            ['value' => $this->correo_administrador]
        );

        session()->flash('message', 'Correos actualizados correctamente.');
    }

    public function render()
    {
        return view('livewire.actualizar-correos-directores');
    }
}
