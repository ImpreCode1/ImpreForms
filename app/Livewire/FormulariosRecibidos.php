<?php

namespace App\Livewire;

use App\Models\Financiera;
use App\Models\FormLink;
use App\Models\Informacion;
// use App\Models\Infonegocio;
use App\Models\Marca;
// use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithStyles;  
use Maatwebsite\Excel\Concerns\WithColumnFormatting;  
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithColumnWidths;  
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;  
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
class FormulariosRecibidos extends Component implements FromCollection, WithMapping, WithStyles, WithColumnWidths, WithColumnFormatting,  WithHeadings  
{
    use WithPagination;
    public $formulario;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public $totalFormularios = 0;
    public $mostrarMas = false;
    // public $showModal = false;
    public $totalDocumentos = 0;
    public $averageSalePrice = 0;
    public $advancePercentage = 0;
    public $noc;
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

    // exportar a exel 

    public function exportar()
    {
        return Excel::download(new self(), 'formularios.xlsx');
    }
    public function collection()
    {
        $marcas = Marca::with('infonegocio', 'financiera','informacion')->get();



        return $marcas;
    }

    public function map($marca): array
{
    $infonegocio = $marca->infonegocio;
    
    $financiera = $marca->financiera->first();
    $operaciones = $marca->informacion->first();

    // Obtener las fechas de actualización o NULL si no existen
    $fechaFinanciera = $financiera ? $financiera->updated_at : null;
    $fechaOperaciones = $operaciones ? $operaciones->updated_at : null;

    // Comparar las fechas y tomar la más reciente
    $fechaMasReciente = null;
    
    if ($fechaFinanciera && $fechaOperaciones) {
        $fechaMasReciente = $fechaFinanciera > $fechaOperaciones ? $fechaFinanciera : $fechaOperaciones;
    } elseif ($fechaFinanciera) {
        $fechaMasReciente = $fechaFinanciera;
    } elseif ($fechaOperaciones) {
        $fechaMasReciente = $fechaOperaciones;
    }

    return [
        $infonegocio ? $infonegocio->codigo_cliente : 'No Completado',
        $infonegocio ? $infonegocio->nombre : 'No Completado',
        $infonegocio ? $infonegocio->n_oportunidad_crm : 'No Completado',
        $marca->created_at ? $marca->created_at->format('Y-m-d') : 'No Completado',
        $financiera ? $financiera->created_at->format('Y-m-d') : 'No Completado', 
        $operaciones ? $operaciones->created_at->format('Y-m-d') : 'No Completado', 
        $fechaMasReciente ? $fechaMasReciente->format('Y-m-d') : 'No fue terminado'
    ];

}


    //! generar pdf
   
    public function headings(): array
    {
        return [
            'Código Cliente',
            'Nombre',
            'Número de Oportunidad CRM',
            'Fecha Creación',
            'Inicio Financiera',
            'Inicio Operaciones',
            'Última Actualización'
        ];
    }
    public function styles(Worksheet $sheet)
{
    //Calcula y toma los datos con informacion para poder pintarlos 

    $usedRange = $sheet->calculateWorksheetDimension();

    //* Se toman y se les aplica color solamente a las casillas y columnas especificadas para pintarlas
    $highestRow = $sheet->getHighestRow();

    return [
       1 => [
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'FDE68A']
            ],
        ],
        'E2:E' . $highestRow => [
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'BBF7D0']
            ],
        ],
        'F2:F' . $highestRow => [
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '93C5FD']
            ],
        ],
    ];
}

    public function columnWidths(): array  
    {  
        return [  
            'A' => 20,  
            'B' => 25,  
            'C' => 20,  
            'D' => 25,  
            'E' => 25,  
            'F' => 25,  
            'G' => 25,  
            'H' => 25,  
        ];  
    }  

    public function columnFormats(): array  
    {  
        return [  
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD,  
            'E' => NumberFormat::FORMAT_DATE_YYYYMMDD,  
            'F' => NumberFormat::FORMAT_DATE_YYYYMMDD,  
        ];  
    }  

   
    public function downloadFormulario($id)
    {
        try {
            $formulario = Marca::with(['infonegocio', 'informacion.producto', 'pago', 'financiera', 'infoEntrega', 'documento', 'formLinks'])->findOrFail($id);

            $pdf = FacadePdf::loadView('pdf.formulario', compact('formulario'));

            return $pdf->download('formulario_' . $formulario->id . '.pdf');
        } catch (\Exception $e) {
            // Log the error or return a specific error response
            return response()->json(['error' => $e->getMessage()], 500);
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
