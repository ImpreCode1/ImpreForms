<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $show = false;
    public $message = '';
    public $title = '';
    public $color = 'bg-green-100';
    public $iconColor = 'green-600';
    public $icon = 'M5 13l4 4L19 7';
    public $buttonText = 'Aceptar';


    public function render()
    {
        return view('livewire.alert');
    }


    public function showAlert($title, $message, $type = 'success')
    {
        $this->title = $title;
        $this->message = $message;


        switch ($type) {
            case 'success':
                $this->color = 'bg-green-100';
                $this->iconColor = 'green-600';
                $this->icon = 'M5 13l4 4L19 7';
                $this->buttonText = 'Aceptar';
                break;
            case 'error':
                $this->color = 'bg-red-100';
                $this->iconColor = 'red-600';
                $this->icon = 'M6 18L18 6M6 6l12 12';
                $this->buttonText = 'Cerrar';
                break;
            case 'warning':
                $this->color = 'bg-yellow-100';
                $this->iconColor = 'yellow-600';
                $this->icon = 'M12 8v4m0 4h.01';
                $this->buttonText = 'Confirmar';
                break;
            case 'info':
                $this->color = 'bg-blue-100';
                $this->iconColor = 'blue-600';
                $this->icon = 'M12 8v4m0 4h.01';
                $this->buttonText = 'Entendido';
                break;
        }


        $this->show = true;
    }


    public function hideAlert()
    {
        $this->show = false;
    }



    public function create()
    {

        $this->showAlert('¡Éxito!', 'El nuevo elemento se ha creado correctamente.', 'success');
    }

    public function edit()
    {

        $this->showAlert('¡Éxito!', 'El elemento ha sido editado correctamente.', 'success');
    }

    public function delete()
    {

        $this->showAlert('Confirmación', '¿Estás seguro de que deseas eliminar este elemento?', 'warning');
    }
}
