<div>
    <x-app-layout>
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-center text-gray-900">Seguimiento de Proyectos</h2>
                    <p class="text-center text-gray-600 mt-2">Gestiona las oportunidades y proyectos</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4 border-b border-gray-200 space-y-4 md:flex md:items-center md:justify-between md:space-y-0">
                        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                            <select wire:model="filtroEstado" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Todos los estados</option>
                                <option value="anulado">Anulado</option>
                                <option value="declinado">Declinado</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="facturado">Facturado</option>
                                <option value="facturado_y_pagado">Facturado y Pagado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="recurrencia">Recurrencia</option>
                            </select>
                            <input type="text" wire:model="filtroCliente" placeholder="Buscar cliente..."
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        @if($isAdmin)
                        <button wire:click="openModal(null)" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Nuevo Seguimiento
                        </button>
                        @endif
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Línea Primary</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Apertura</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Facturación</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($seguimientos as $seg)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $seg->cliente }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $seg->linea_primaria }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($seg->valor, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $seg->fecha_apertura?->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $seg->fecha_facturacion?->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button wire:click="openModal({{ $seg->id }})" class="text-indigo-600 hover:text-indigo-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            wire:close="$set('showModal', false)" 
        />
        @endif
    </x-app-layout>
</div>