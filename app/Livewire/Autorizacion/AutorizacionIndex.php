<?php
namespace App\Livewire\Autorizacion;

use Livewire\Component;
use App\Models\Marca;
use Illuminate\Support\Facades\Auth;

class AutorizacionIndex extends Component
{
    public string $filtroEstado = 'pendiente';
    public ?int $marcaSeleccionadaId = null;
    public string $comentario = '';
    public bool $modalAbierto = false;

    public function mount(): void
    {
        abort_unless(Auth::user()->isAdmin(), 403, 'Acceso restringido.');
    }

    public function abrirModal(int $id): void
    {
        $this->marcaSeleccionadaId = $id;
        $this->comentario = '';
        $this->modalAbierto = true;
    }

    public function cerrarModal(): void
    {
        $this->modalAbierto = false;
        $this->marcaSeleccionadaId = null;
        $this->comentario = '';
    }

    public function aprobar(): void
    {
        if (!$this->marcaSeleccionadaId) return;

        Marca::where('id', $this->marcaSeleccionadaId)->update([
            'estado_autorizacion'     => 'aprobado',
            'autorizado_por'          => Auth::id(),
            'autorizado_en'           => now(),
            'comentario_autorizacion' => $this->comentario ?: null,
        ]);

        $this->cerrarModal();
        session()->flash('mensaje', 'Formulario aprobado correctamente.');
    }

    public function rechazar(): void
    {
        $this->validate([
            'comentario' => 'required|min:5',
        ], [
            'comentario.required' => 'El comentario es obligatorio para rechazar.',
            'comentario.min'      => 'El comentario debe tener al menos 5 caracteres.',
        ]);

        if (!$this->marcaSeleccionadaId) return;

        Marca::where('id', $this->marcaSeleccionadaId)->update([
            'estado_autorizacion'     => 'rechazado',
            'autorizado_por'          => Auth::id(),
            'autorizado_en'           => now(),
            'comentario_autorizacion' => $this->comentario,
        ]);

        $this->cerrarModal();
        session()->flash('mensaje', 'Formulario rechazado.');
    }

    public function render()
    {
        $marcas = Marca::with(['infonegocio'])
            ->when($this->filtroEstado !== 'todos', function ($q) {
                $q->where('estado_autorizacion', $this->filtroEstado);
            })
            ->latest()
            ->get();

        $marcaSeleccionada = $this->marcaSeleccionadaId
            ? Marca::with(['infonegocio'])->find($this->marcaSeleccionadaId)
            : null;

        return view('livewire.autorizacion.autorizacion-index', compact('marcas', 'marcaSeleccionada'))
            ->layout('layouts.app');
    }
}
