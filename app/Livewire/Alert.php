<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $show = false;
    public $title;
    public $message;
    public $action = 'confirm';
    public $type = 'warning';
    public $confirmEvent;
    public $color;
    public $iconColor;
    public $icon;
    public $buttonText;

    protected $listeners = ['showAlert'];

    public function mount()
    {
        $this->resetAlert();
    }

    public function showAlert($title, $message, $type = 'warning', $action = 'confirm', $confirmEvent = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->action = $action;
        $this->confirmEvent = $confirmEvent;

        switch ($type) {
            case 'success':
                $this->color = 'bg-green-50';
                $this->iconColor = 'green-500';
                $this->icon = 'M5 13l4 4L19 7';
                $this->buttonText = 'Aceptar';
                break;
            case 'error':
                $this->color = 'bg-red-50';
                $this->iconColor = 'red-500';
                $this->icon = 'M6 18L18 6M6 6l12 12';
                $this->buttonText = 'Eliminar';
                break;
            case 'warning':
                $this->color = 'bg-yellow-50';
                $this->iconColor = 'yellow-500';
                $this->icon = 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z';
                $this->buttonText = 'Confirmar';
                break;
            case 'info':
                $this->color = 'bg-blue-50';
                $this->iconColor = 'blue-500';
                $this->icon = 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
                $this->buttonText = 'Entendido';
                break;
        }

        $this->show = true;
    }

    public function confirm()
    {
        if ($this->confirmEvent) {
            $this->emit($this->confirmEvent);
        }
        $this->resetAlert();
    }

    public function cancel()
    {
        $this->resetAlert();
    }

    private function resetAlert()
    {
        $this->show = false;
        $this->title = '';
        $this->message = '';
        $this->action = 'confirm';
        $this->confirmEvent = null;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
