<?php
namespace App\Livewire;

use App\Imports\CodigoCliente;
use App\Imports\ColaboradoresImport;
use App\Imports\DirectoresImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Executive;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExecutivesImport;
use App\Imports\LineasImport;
use App\Models\Codigo;
use App\Models\Colaborador;
use App\Models\Director;
use App\Models\Linea;

class CargarReporte extends Component
{
    use WithFileUploads;
    public $archivoColaboradores;
    public $archivoDirectores;
    public $archivoLineas;
    public $file;

    public function import()
    {
        $this->validate(
            [
                'file' => 'required|mimes:xlsx,xls,csv|max:10240',
            ],
            [
                'file.required' => 'El archivo de ejecutivos es obligatorio.',
                'file.mimes' => 'El archivo debe ser un archivo de tipo xlsx, xls o csv.',
                'file.max' => 'El archivo no debe exceder los 10 MB.',
            ],
        );

        Executive::truncate();
        Excel::import(new ExecutivesImport(), $this->file->getRealPath());
        $this->file = null;
        session()->flash('success', 'Archivo de ejecutivos cargado y procesado correctamente.');
    }

    public function importColaboradores()
    {
        $this->validate(
            [
                'archivoColaboradores' => 'required|mimes:xlsx,xls,csv|max:10240',
            ],
            [
                'archivoColaboradores.required' => 'El archivo de colaboradores es obligatorio.',
                'archivoColaboradores.mimes' => 'El archivo de colaboradores debe ser de tipo xlsx, xls o csv.',
                'archivoColaboradores.max' => 'El archivo de colaboradores no debe exceder los 10 MB.',
            ],
        );

        Colaborador::truncate();
        Excel::import(new ColaboradoresImport(), $this->archivoColaboradores->getRealPath());
        $this->archivoColaboradores = null;

        session()->flash('success', 'Archivo de colaboradores cargado y procesado correctamente.');
    }

    public function importDirectores()
    {
        $this->validate(
            [
                'archivoDirectores' => 'required|mimes:xlsx,xls,csv|max:10240',
            ],
            [
                'archivoDirectores.required' => 'El archivo de directores es obligatorio.',
                'archivoDirectores.mimes' => 'El archivo de directores debe ser de tipo xlsx, xls o csv.',
                'archivoDirectores.max' => 'El archivo de directores no debe exceder los 10 MB.',
            ],
        );

        Director::truncate();
        Excel::import(new DirectoresImport(), $this->archivoDirectores->getRealPath());
        $this->archivoDirectores = null;

        session()->flash('success', 'Archivo de directores cargado y procesado correctamente.');
    }

    public function importlineas()
    {
        $this->validate(
            [
                'archivoLineas' => 'required|mimes:xlsx,xls,csv|max:10240',
            ],
            [
                'archivoLineas.required' => 'El archivo de líneas es obligatorio.',
                'archivoLineas.mimes' => 'El archivo de líneas debe ser de tipo xlsx, xls o csv.',
                'archivoLineas.max' => 'El archivo de líneas no debe exceder los 10 MB.',
            ],
        );

        Linea::truncate();
        Excel::import(new LineasImport(), $this->archivoLineas->getRealPath());
        $this->archivoLineas = null;

        session()->flash('success', 'Archivo de líneas cargado y procesado correctamente.');
    }

    public function importCodigoCliente()
    {
        $this->validate(
            [
                'file' => 'required|mimes:xlsx,xls,csv|max:10240',
            ],
            [
                'file.required' => 'El archivo de códigos de cliente es obligatorio.',
                'file.mimes' => 'El archivo de códigos de cliente debe ser de tipo xlsx, xls o csv.',
                'file.max' => 'El archivo de códigos de cliente no debe exceder los 10 MB.',
            ],
        );

        Codigo::truncate();
        Excel::import(new CodigoCliente(), $this->file->getRealPath());
        $this->file = null;

        session()->flash('success', 'Archivo de códigos de cliente cargado y procesado correctamente.');
    }
    public function render()
    {
        return view('livewire.cargar-reporte');
    }
}
