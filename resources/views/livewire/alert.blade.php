<div>
    <div x-data="{ show: @entangle('show') }"
         x-show="show"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <!-- Backdrop con efecto de desenfoque -->
        <div class="fixed inset-0 backdrop-blur-sm bg-black/30" aria-hidden="true"></div>

        <!-- Contenedor principal centrado -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <!-- Modal con sombra y bordes mejorados -->
            <div class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white shadow-[0_20px_70px_-10px_rgba(0,0,0,0.3)] transition-all"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">

                <!-- Borde superior de color según el tipo -->
                <div class="absolute inset-x-0 top-0 h-1 {{ str_replace('bg-', 'bg-', $color) }}"></div>

                <!-- Contenido principal -->
                <div class="px-6 pt-6 pb-4">
                    <div class="flex items-start space-x-4">
                        <!-- Icono con fondo suave y sombra -->
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full {{ $color }} shadow-inner">
                                <svg class="h-6 w-6 text-{{ $iconColor }}" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Texto con mejor espaciado y tipografía -->
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold tracking-tight text-gray-900">
                                {{ $title }}
                            </h3>
                            <p class="mt-2 text-sm leading-6 text-gray-600">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Separador sutil -->
                <div class="border-t border-gray-100"></div>

                <!-- Botones con mejor espaciado y estilos -->
                <div class="px-6 py-4 flex justify-end space-x-3">
                    <!-- Botón Cancelar con hover y focus states mejorados -->
                    <button wire:click="cancel"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors">
                        Cancelar
                    </button>

                    <!-- Botón principal con estilos según la acción -->
                    @switch($action)
                        @case('delete')
                            <button wire:click="confirm"
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Eliminar
                            </button>
                            @break
                        @case('edit')
                            <button wire:click="confirm"
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </button>
                            @break
                        @default
                            <button wire:click="confirm"
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $buttonText }}
                            </button>
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>
