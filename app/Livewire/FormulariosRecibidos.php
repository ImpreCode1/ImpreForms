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
use Dom\Text;
use Illuminate\Support\Facades\Mail;
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
use Symfony\Component\Mime\Part\TextPart;

class FormulariosRecibidos extends Component implements FromCollection, WithMapping, WithStyles, WithColumnWidths, WithColumnFormatting, WithHeadings
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
    public $completedContracts = [];
    public $incompleteContracts = [];
    public $maxFormularios;

    public $open = false;

    protected $listeners = ['openModal' => 'loadFormulario'];

    public function approveFormulario($id)
    {
        $formulario = Marca::with(['formLinks'])->findOrFail($id);
        $operacionesLink = $formulario->formLinks->where('type', 'operaciones')->first()->link;
        $financieraLink = $formulario->formLinks->where('type', 'financiera')->first()->link;
        $emails = ['sebastian.ortiz@impresistem.com', 'sebastian.ortiz@impresistem.com'];

        // URLs completas usando url() helper para obtener el dominio correcto automáticamente
        $links = [url("/formulario-operaciones/{$operacionesLink}"), url("/formulario-financiera/{$financieraLink}")];

        $titles = ['Formulario de Operaciones', 'Formulario Financiero'];
        $descriptions = ['Complete la información requerida', 'Complete la información necesaria'];

        foreach ($emails as $index => $email) {
            $link = $links[$index];
            $title = $titles[$index];
            $description = $descriptions[$index];

            Mail::send([], [], function ($message) use ($email, $link, $title, $description) {
                $message
                    ->to($email)
                    ->subject('Enlace para diligenciamiento de formulario – Plazo de 3 días')
                    ->setBody(
                        new TextPart(
                            "
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset='utf-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1'>
                        </head>
                        <body>
                            <h2>¡Información Aprobada!</h2>
                            <p>Buen día,</p>
                            <p>Su formulario ha sido aprobado. Por favor, complete el formulario correspondiente a continuación:</p>
                            <a href='{$link}' style='display:inline-block;padding:10px 20px;background-color:#2989d8;color:white;text-decoration:none;border-radius:8px;'>
                                {$title}
                            </a>
                            <p style='margin-top:10px;'>{$description}</p>
                            <p>⚠️ El plazo máximo para enviar el formulario completado es de 2 días.</p>
                            <p>Saludos cordiales.</p>
                        </body>
                        </html>
                        ",
                            'utf-8',
                            'html',
                        ),
                    );
            });
        }

        session()->flash('message', 'Formulario aprobado y correos enviados correctamente.');
        $this->closeModal();
    }
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
        $this->advancePercentage = Financiera::avg('porcentaje');

        // Formularios completados (todas las relaciones están presentes)
        $this->completedContracts = Marca::whereHas('infonegocio')
            ->whereHas('informacion')
            ->whereHas('financiera', function ($query) {
                $query->whereNotNull('plazo');
            })
            ->whereHas('infoEntrega')
            ->get();

        // Formularios incompletos (ninguna de las relaciones está presente)
        $this->incompleteContracts = Marca::where(function ($query) {
            $query
                ->doesntHave('infonegocio')
                ->orDoesntHave('informacion')
                ->orWhereDoesntHave('financiera', function ($query) {
                    $query->whereNotNull('plazo');
                })
                ->orDoesntHave('infoEntrega');
        })->get();

        $this->maxFormularios = 100;
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
            session()->flash('message', 'Enlaces restablecidos y extendidos por 3 dias.');
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
        $marcas = Marca::with('infonegocio', 'financiera', 'informacion')->get();

        return $marcas;
    }

    public function map($marca): array
    {
        $infonegocio = $marca->infonegocio;

        $financiera = $marca->financiera->first();
        $operaciones = $marca->infoEntrega->first();

        $financieraIniciada = $financiera && $financiera->plazo && $financiera->forma_pago && $financiera->moneda;
        $operacionesIniciada = $operaciones && $operaciones->origen && $operaciones->destino && $operaciones->transporte;

        $fechaFinanciera = $financieraIniciada ? $financiera->updated_at : null;
        $fechaOperaciones = $operacionesIniciada ? $operaciones->updated_at : null;

        $fechaPrimerEnvioFinanciera = $financieraIniciada ? $financiera->created_at : null;
        $fechaPrimerEnvioOperaciones = $operacionesIniciada ? $operaciones->created_at : null;

        $fechaMasReciente = null;

        if ($fechaFinanciera && $fechaOperaciones) {
            $fechaMasReciente = $fechaFinanciera > $fechaOperaciones ? $fechaFinanciera : $fechaOperaciones;
        } elseif ($fechaFinanciera) {
            $fechaMasReciente = $fechaFinanciera;
        } elseif ($fechaOperaciones) {
            $fechaMasReciente = $fechaOperaciones;
        }

        return [
            $marca->created_at ? $marca->created_at->format('Y-m-d') : 'No Completado', // Fecha de solicitud
            $marca->tipo_solicitud ? $marca->tipo_solicitud : 'No Completado', // Tipo de Solicitud
            $infonegocio ? preg_replace('/\D/', '', $infonegocio->n_oportunidad_crm) : 'No Completado', // Número de oportunidad en el CRM
            $infonegocio ? preg_replace('/\D/', '', $infonegocio->codigo_cliente) : 'No Completado', // Código Cliente
            $infonegocio ? $infonegocio->nombre : 'No Completado', // Nombre del cliente
            $infonegocio ? $infonegocio->codigo_linea : 'No Completado', // Código de línea
            $infonegocio ? $infonegocio->nombre_linea : 'No Completado', // Nombre de la línea
            $marca->precio_venta ? $marca->precio_venta : 'No Completado', // Precio venta
            $marca->user->name ? $marca->user->name : 'No Completado', // Solicitante
            $marca->user->cargo ? $marca->user->cargo : 'No Completado', // Cargo solicitante
            $fechaPrimerEnvioFinanciera ? $fechaPrimerEnvioFinanciera->format('Y-m-d') : 'No Iniciado', // Fecha inicio financiera
            $fechaPrimerEnvioOperaciones ? $fechaPrimerEnvioOperaciones->format('Y-m-d') : 'No Iniciado', // Fecha Inicio Operaciones
            $fechaMasReciente ? $fechaMasReciente->format('Y-m-d') : 'No fue terminado', // Última Actualización
        ];
    }

    public function headings(): array
    {
        return ['Fecha de solicitud', 'Tipo de Solicitud', 'Número de oportunidad en el CRM', 'Código Cliente', 'Nombre del cliente', 'Código de línea', 'Nombre de la línea', 'Precio venta', 'Solicitante', 'Cargo solicitante', 'Fecha inicio financiera', 'Fecha Inicio Operaciones', 'Última Actualización'];
    }
    //! generar pdf

    // public function headings(): array
    // {
    //     return ['Solicitante', 'Precio venta', 'Tipo de Solicitud', 'Código Cliente', 'Nombre', 'Número de Oportunidad CRM', 'Fecha Creación', 'Inicio Financiera', 'Inicio Operaciones', 'Última Actualización'];
    // }

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
                    'startColor' => ['rgb' => 'FDE68A'],
                ],
            ],
            'H2:H' . $highestRow => [
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => 'BBF7D0'],
                ],
            ],
            'I2:I' . $highestRow => [
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '93C5FD'],
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
                // 'D' => NumberFormat::FORMAT_DATE_YYYYMMDD,
                // 'E' => NumberFormat::FORMAT_DATE_YYYYMMDD,
                // 'F' => NumberFormat::FORMAT_DATE_YYYYMMDD,
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
