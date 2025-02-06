<?php

namespace App\Livewire;

use App\Models\Financiera;
use App\Models\FormLink;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class FormulariosRecibidos extends Component
{
    use WithPagination;
    public $formulario;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    // public $results = [];
    public $totalFormularios = 0;
    public $mostrarMas = false;
    // public $showModal = false;
    public $totalDocumentos = 0;
    public $averageSalePrice = 0;
    public $advancePercentage = 0;

    public $selectedFormulario = null;
    protected $paginationTheme = 'tailwind';

    public $open = false;

    protected $listeners = ['openModal' => 'loadFormulario'];

    public function getFileIcon($fileName)
    {
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $icons = [
            'pdf' => 'file-pdf',
            'doc' => 'file-word',
            'docx' => 'file-word',
            'xls' => 'file-excel',
            'xlsx' => 'file-excel',
            'jpg' => 'file-image',
            'jpeg' => 'file-image',
            'png' => 'file-image',
            'zip' => 'file-zipper',
            'rar' => 'file-zipper',
        ];

        return $icons[$extension] ?? 'file';
    }

    public function toggleMostrarMas()
    {
        $this->mostrarMas = !$this->mostrarMas;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSorting($field)
    {
        if (strpos($field, '_asc') !== false) {
            $this->sortBy = str_replace('_asc', '', $field);
            $this->sortDirection = 'asc';
        } elseif (strpos($field, '_desc') !== false) {
            $this->sortBy = str_replace('_desc', '', $field);
            $this->sortDirection = 'desc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function mount()
    {
        $this->totalFormularios = Marca::count();
        $this->averageSalePrice = Marca::avg('precio_venta');
        $this->advancePercentage = Financiera::avg('porcentaje');

        // $this->formulario = FormLink::all();
    }

    #[On('openModal')]
    public function loadFormulario($id)
    {
        $this->selectedFormulario = Marca::with(['infonegocio', 'informacion.producto', 'pago', 'financiera', 'infoEntrega', 'documento', 'formLinks'])->findOrFail($id);

        // dd($this->selectedFormulario->documento);
        $this->open = true;
    }

    public function closeModal()
    {
        $this->selectedFormulario = null;
        $this->open = false;
    }

    public function resetLinks($marcaId)
    {
        try {
            $formLinks = FormLink::where('marca_id', $marcaId)->get();

            if ($formLinks->isEmpty()) {
                session()->flash('error', 'No se encontraron enlaces para restablecer.');
                return;
            }

            $newExpiryTime = Carbon::now()->addMinutes(40);

            foreach ($formLinks as $link) {
                $link->expires_at = $newExpiryTime;
                $link->save();
            }

            $this->dispatch('links-reset');
            session()->flash('message', 'Enlaces restablecidos y extendidos por 40 minutos.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al restablecer los enlaces: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $query = Marca::with('infonegocio', 'informacion')->when($this->search, function ($query) {
            $query->whereHas('infonegocio', function ($q) {
                $q->where('codigo_cliente', 'like', '%' . $this->search . '%')
                    ->orWhere('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('n_oportunidad_crm', 'like', '%' . $this->search . '%');
            });
        });

        $formularios = $query->orderBy($this->sortBy, $this->sortDirection)->paginate(10);

        return view('livewire.formularios-recibidos', [
            'formularios' => $formularios,
            'totalFormularios' => $this->totalFormularios,
        ]);
    }
}
