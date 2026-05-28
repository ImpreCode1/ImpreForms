<div>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="p-4 sm:p-6 lg:p-8">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-center text-gray-900">Seguimiento de Proyectos</h2>
                <p class="text-center text-gray-600 mt-2">Gestiona las oportunidades y proyectos</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg">
                <div class="p-4 border-b border-gray-200">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-4 md:mb-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <select wire:model.live="filtroEstado" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Todos los estados</option>
                                <option value="anulado">Anulado</option>
                                <option value="declinado">Declinado</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="facturado">Facturado</option>
                                <option value="facturado_y_pagado">Facturado y Pagado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="recurrencia">Recurrencia</option>
                            </select>
                            <input type="text" wire:model.live.debounce.300ms="filtroBusqueda" placeholder="Buscar cliente, oportunidad o línea..."
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-72">
                        </div>
                        <div class="shrink-0">
                            <button wire:click="exportar"
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                Exportar Excel
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto w-full rounded-lg border border-gray-200">
                    <div class="min-w-[1100px]">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="sticky left-0 z-20 bg-white px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap border-r border-gray-200">
                                    N° Oportunidad
                                </th>
                                <th class="sticky left-[140px] z-20 bg-white px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap border-r border-gray-200">Cliente</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Línea Primera</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado Negocio</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Apertura</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Cierre</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Facturación</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ac. Cierre</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Obs.</th>
                                <th class="whitespace-nowrap px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($seguimientos as $seg)
                            <tr class="hover:bg-gray-50">
                                <td class="sticky left-0 z-10 bg-white px-4 py-3 text-sm text-gray-900 whitespace-nowrap border-r border-gray-200">
                                    {{ $seg->numero_oportunidad ?? '—' }}
                                </td>
                                <td class="sticky left-[140px] z-10 bg-white px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap border-r border-gray-200">{{ $seg->cliente }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500">{{ $seg->linea_primaria }}</td>
                                <td class="whitespace-nowrap px-4 py-4">
                                    @php
                                    $colors = [
                                        'anulado' => 'bg-red-100 text-red-800',
                                        'declinado' => 'bg-gray-100 text-gray-800',
                                        'en_proceso' => 'bg-blue-100 text-blue-800',
                                        'facturado' => 'bg-green-100 text-green-800',
                                        'facturado_y_pagado' => 'bg-green-700 text-white',
                                        'pendiente' => 'bg-yellow-100 text-yellow-800',
                                        'recurrencia' => 'bg-purple-100 text-purple-800',
                                    ];
                                    @endphp
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$seg->estado] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst(str_replace('_', ' ', $seg->estado)) }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500">{{ $seg->estado_negocio ?: '—' }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-900">{{ $seg->valor ? number_format((float)$seg->valor, 0, ',', '.') : '—' }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500">{{ $seg->fecha_apertura?->format('d/m/Y') }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500">{{ $seg->fecha_cierre?->format('d/m/Y') }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500">{{ $seg->fecha_facturacion?->format('d/m/Y') }}</td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-center">
                                    <span class="{{ $seg->actas_cierre ? 'text-green-600' : 'text-red-500' }}">{{ $seg->actas_cierre ? '✅ Sí' : '❌ No' }}</span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-center">
                                    <span class="{{ $seg->observaciones ? 'text-green-600' : 'text-red-500' }}">{{ $seg->observaciones ? '✅ Sí' : '❌ No' }}</span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-1">
                                        <button wire:click="openDetail({{ $seg->id }})" class="text-gray-500 hover:text-gray-700 p-1" title="Ver detalles">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        <button wire:click="openModal({{ $seg->id }})" class="text-indigo-600 hover:text-indigo-900 p-1" title="Editar seguimiento">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="px-4 py-8 text-center text-gray-500">
                                    No hay seguimientos registrados
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $seguimientos->links() }}
                </div>
            </div>
        </div>
    </div>

    @if($showModal)
    <livewire:seguimiento.seguimiento-form 
        :seguimiento-id="$seguimientoId" 
        :key="$seguimientoId ?? 'new-' . now()->timestamp"
        @close-modal.window="$wire.set('showModal', false); $wire.set('seguimientoId', null)"
    />
    @endif

    @if($showDetailModal && $detailSeguimiento)
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" wire:click="closeDetail"></div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Detalles del Seguimiento</h3>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
                        @foreach([
                            'N° Oportunidad' => $detailSeguimiento->numero_oportunidad ?? '—',
                            'Cliente' => $detailSeguimiento->cliente ?: '—',
                            'Línea Primera' => $detailSeguimiento->linea_primaria ?: '—',
                            'Estado' => ucfirst(str_replace('_', ' ', $detailSeguimiento->estado)),
                            'Estado Negocio' => $detailSeguimiento->estado_negocio ?: '—',
                            'Valor' => $detailSeguimiento->valor ? 'COP ' . number_format((float)$detailSeguimiento->valor, 0, ',', '.') : '—',
                            'Fecha Apertura' => $detailSeguimiento->fecha_apertura?->format('d/m/Y') ?: '—',
                            'Fecha Cierre' => $detailSeguimiento->fecha_cierre?->format('d/m/Y') ?: '—',
                            'Fecha Facturación' => $detailSeguimiento->fecha_facturacion?->format('d/m/Y') ?: '—',
                            'Incoterm' => $detailSeguimiento->incoterm ?: '—',
                            'Anticipos' => $detailSeguimiento->anticipos ?: '—',
                            'Tiempos Entrega' => $detailSeguimiento->tiempos_entrega ?: '—',
                            'Forma Pago' => $detailSeguimiento->forma_pago ?: '—',
                            'Facturación' => $detailSeguimiento->facturacion ?: '—',
                            'Actas Cierre' => $detailSeguimiento->actas_cierre ?: '—',
                            'Observaciones' => $detailSeguimiento->observaciones ?: '—',
                        ] as $label => $value)
                        <div>
                            <p class="text-xs text-gray-500 font-medium">{{ $label }}</p>
                            <p class="text-gray-900 mt-0.5">{{ $value }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="closeDetail" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
