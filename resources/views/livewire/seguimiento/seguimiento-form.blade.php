<div class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" wire:click="$parent.closeModal()"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $editMode ? 'Editar Seguimiento' : 'Nuevo Seguimiento' }}
                        </h3>

                        <form wire:submit.prevent="save" class="mt-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Cliente</label>
                                    <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800 font-medium">
                                        {{ $cliente ?: '—' }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Línea Primera</label>
                                    <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">
                                        {{ $linea_primaria ?: '—' }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Estado *</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $estado }}</div>
                                    @else
                                        <select wire:model="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="pendiente">Pendiente</option>
                                            <option value="en_proceso">En Proceso</option>
                                            <option value="facturado">Facturado</option>
                                            <option value="facturado_y_pagado">Facturado y Pagado</option>
                                            <option value="recurrencia">Recurrencia</option>
                                            <option value="declinado">Declinado</option>
                                            <option value="anulado">Anulado</option>
                                        </select>
                                        @error('estado') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Apertura</label>
                                    <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">
                                        {{ $fecha_apertura ? \Carbon\Carbon::parse($fecha_apertura)->format('d/m/Y') : '—' }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Cierre</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $fecha_cierre ? \Carbon\Carbon::parse($fecha_cierre)->format('d/m/Y') : '—' }}</div>
                                    @else
                                        <input type="date" wire:model="fecha_cierre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Facturación</label>
                                    <input type="date" wire:model="fecha_facturacion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Valor</label>
                                    <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">
                                        {{ $valor ? '$' . number_format((float)$valor, 0, ',', '.') : '—' }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Estado Negocio</label>
                                    <input type="text" wire:model="estado_negocio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Incoterm</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $incoterm ?: '—' }}</div>
                                    @else
                                        <input type="text" wire:model="incoterm" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Anticipos</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $anticipos ?: '—' }}</div>
                                    @else
                                        <textarea wire:model="anticipos" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tiempos Entrega</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $tiempos_entrega ?: '—' }}</div>
                                    @else
                                        <textarea wire:model="tiempos_entrega" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Forma Pago</label>
                                    @if($editMode)
                                        <div class="mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-800">{{ $forma_pago ?: '—' }}</div>
                                    @else
                                        <textarea wire:model="forma_pago" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Facturación</label>
                                    @if($isAdmin)
                                        <textarea wire:model="facturacion" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @else
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600">{{ $facturacion ?: 'Sin información' }}</div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Actas Cierre</label>
                                    @if($isAdmin)
                                        <textarea wire:model="actas_cierre" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @else
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600">{{ $actas_cierre ?: 'Sin información' }}</div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Observaciones</label>
                                    @if($isAdmin)
                                        <textarea wire:model="observaciones" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @else
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600">{{ $observaciones ?: 'Sin información' }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                    {{ $editMode ? 'Actualizar' : 'Crear' }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" wire:click="$parent.closeModal()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
