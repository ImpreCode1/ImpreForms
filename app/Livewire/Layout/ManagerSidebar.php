<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class ManagerSidebar extends Component
{
    public $vista = 'historial'; 

    public function setVista($nuevaVista)
    {
        $this->vista = $nuevaVista; 
    }

    public function render()
    {
        return view('livewire.layout.manager-sidebar',
            ['vista' => $this->vista,    
        ]);
    }
}
