<div>
    @if (session()->has('mensaje'))
        <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800 text-sm">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Autorización de Formularios</h1>
        <select wire:model.live="filtroEstado"
                class="rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="pendiente">Pendientes</option>
            <option value="en_revision">En revisión</option>
            <option value="aprobado">Aprobados</option>
            <option value="rechazado">Rechazados</option>
            <option value="todos">Todos</option>
        </select>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">N° Oportunidad</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Cliente</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Línea</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Estado</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Fecha envío</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($marcas as $marca)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-700">
                            {{ $marca->infonegocio->n_oportunidad_crm ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-gray-700">
                            {{ $marca->infonegocio->nombre ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $marca->linea ?? '—' }}</td>
                        <td class="px-4 py-3">
                            @php
                                $badgeClases = [
                                    'pendiente'   => 'bg-yellow-100 text-yellow-800',
                                    'en_revision' => 'bg-blue-100 text-blue-800',
                                    'aprobado'    => 'bg-green-100 text-green-800',
                                    'rechazado'   => 'bg-red-100 text-red-800',
                                ];
                                $clase = $badgeClases[$marca->estado_autorizacion] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="rounded-full px-2 py-1 text-xs font-medium {{ $clase }}">
                                {{ ucfirst(str_replace('_', ' ', $marca->estado_autorizacion)) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">
                            {{ $marca->created_at?->format('d/m/Y') ?? '—' }}
                        </td>
                        <td class="px-4 py-3">
                            <button wire:click="abrirModal({{ $marca->id }})"
                                    class="rounded bg-blue-600 px-3 py-1 text-xs text-white hover:bg-blue-700">
                                Revisar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-400">
                            No hay formularios en este estado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($modalAbierto && $marcaSeleccionada)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="w-full max-w-lg rounded-xl bg-white p-6 shadow-xl">
                <h2 class="mb-4 text-lg font-bold text-gray-800">
                    Revisar Formulario — {{ $marcaSeleccionada->infonegocio->nombre ?? 'Sin cliente' }}
                </h2>

                <div class="mb-4 space-y-2 text-sm text-gray-700">
                    <div><span class="font-medium">N° Oportunidad:</span>
                        {{ $marcaSeleccionada->infonegocio->n_oportunidad_crm ?? '—' }}</div>
                    <div><span class="font-medium">Línea:</span> {{ $marcaSeleccionada->linea ?? '—' }}</div>
                    <div><span class="font-medium">Precio:</span>
                        {{ $marcaSeleccionada->precio_venta ?? '—' }}
                        {{ $marcaSeleccionada->moneda_precio_venta ?? '' }}</div>
                    <div><span class="font-medium">Forma de pago:</span>
                        {{ $marcaSeleccionada->forma_pago ?? '—' }}</div>
                    <div><span class="font-medium">Estado actual:</span>
                        {{ ucfirst(str_replace('_', ' ', $marcaSeleccionada->estado_autorizacion)) }}</div>
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Comentario
                        <span class="text-gray-400">(obligatorio para rechazar)</span>
                    </label>
                    <textarea wire:model="comentario" rows="3"
                              class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Escribe un comentario..."></textarea>
                    @error('comentario')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <button wire:click="cerrarModal"
                            class="rounded border border-gray-300 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button wire:click="rechazar"
                            class="rounded bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-700">
                        Rechazar
                    </button>
                    <button wire:click="aprobar"
                            class="rounded bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700">
                        Aprobar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
