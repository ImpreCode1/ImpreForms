<div>
    <x-app-layout>
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header con estadísticas -->
                <div class="mb-8">
                    <div class="container mx-auto px-4 py-8">
                        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Formularios Recibidos</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <!-- Total Formularios -->
                            <div
                                class="bg-gradient-to-br from-blue-100 to-blue-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-blue-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="100, 100"
                                            stroke-dashoffset="25" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-white text-3xl font-bold">
                                        {{-- {{ $totalFormularios }} --}}
                                        #
                                    </div>
                                </div>
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Total Formularios</p>
                                    <p class="text-xl font-bold">{{ $totalFormularios }}</p>
                                </div>
                            </div>

                            <!-- Promedio de ventas -->
                            <div
                                class="bg-gradient-to-br from-purple-100 to-purple-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-purple-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="60, 100"
                                            stroke-dashoffset="20" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold">
                                        $
                                    </div>
                                </div>
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Promedio de Precio de Venta</p>
                                    <p class="text-xl font-bold">${{ number_format($averageSalePrice, 2) }}</p>
                                </div>
                            </div>

                            <!-- Porcentaje de Anticipo -->
                            <div
                                class="bg-gradient-to-br from-yellow-100 to-yellow-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-yellow-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="40, 100"
                                            stroke-dashoffset="30" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-white text-3xl font-bold">
                                        %
                                    </div>
                                </div>
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Porcentaje de Anticipo</p>
                                    <p class="text-xl font-bold">{{ number_format($advancePercentage, 2) }}%</p>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>


                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Barra de herramientas -->
                    <div class="p-6 border-b border-gray-200 bg-gray-50">
                        <div
                            class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 gap-4">
                            <div class="relative w-full max-w-md group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition-colors"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model.live="search" type="text"
                                    placeholder="Buscar por código, nombre o n° oportunidad"
                                    class="w-full px-4 pl-10 py-3 text-sm text-gray-900
                                              bg-white border-2 border-gray-200 rounded-xl
                                              focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                              hover:border-gray-300
                                              transition-all duration-300
                                              placeholder:text-gray-500
                                              shadow-sm hover:shadow-md" />
                            </div>

                            <div class="flex items-center space-x-4 w-full md:w-auto">
                                <select wire:change="setSorting($event.target.value)"
                                    class="w-full md:w-48 px-4 py-3 text-sm text-gray-700
                                               bg-white border-2 border-gray-200 rounded-xl
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                                               hover:border-gray-300
                                               transition-all duration-300
                                               appearance-none
                                               cursor-pointer">
                                    <option value="" disabled selected>Ordenar por</option>
                                    <option value="created_at">Fecha - Reciente</option>
                                    <option value="created_at_asc">Fecha - Antiguo</option>
                                </select>

                                <button
                                    class="group relative px-4 py-2 text-xs font-semibold text-white
                                        bg-gradient-to-r from-blue-500 to-blue-600
                                        rounded-lg shadow-md
                                      hover:from-blue-600 hover:to-blue-700
                                        focus:outline-none focus:ring-4 focus:ring-blue-300
                                        transition-all duration-300
                                        transform hover:scale-105 active:scale-95
                                        flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 3a1 1 0 011-1h8a1 1 0 011 1v14a1 1 0 01-1 1H6a1 1 0 01-1-1V3zm3 10.293a1 1 0 011.414 0L10 13.586l.293-.293a1 1 0 011.414 1.414l-1 1a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414l2-2a1 1 0 011.414 1.414L10 12.586l-.293-.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Generar Reporte
                                </button>



                            </div>
                        </div>


                    </div>

                    <!-- Mensaje de "No hay resultados" -->
                    @if (!$formularios || count($formularios) === 0)
                        <div class="mt-4">
                            <div
                                class="flex flex-col items-center justify-center p-6 text-center text-gray-600 bg-gray-100 rounded-lg shadow">
                                <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-lg font-medium">No se encontraron resultados</p>
                                <p class="text-sm text-gray-500 mt-2">Intenta con un término de búsqueda diferente.</p>
                            </div>
                        </div>
                    @endif

                    <!-- Tabla -->
                    @if ($formularios->isNotEmpty())
                        <div class="overflow-x-auto" wire:poll.visible.60s>
                            <table class="w-full table-auto border-collapse border border-gray-200 shadow-sm">
                                <thead>
                                    <tr class="bg-gray-50 border-b border-gray-200">
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">Código
                                            del cliente</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">Nombre
                                            cliente</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">N°
                                            oportunidad</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">
                                            Información Completa</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">
                                            Contrato</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">Fecha
                                            de envío</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">Info
                                            Marcas</th>
                                        <th class="group px-6 py-4 text-left text-sm font-medium text-gray-700">Links
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($formularios as $formulario)
                                        <tr class="hover:bg-gray-100 transition-all duration-200 cursor-pointer">
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                {{ $formulario->infonegocio->codigo_cliente }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                {{ $formulario->infonegocio->nombre }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                {{ $formulario->infonegocio->n_oportunidad_crm }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <button x-data
                                                    x-on:click="$dispatch('show-modal'); $wire.loadFormulario({{ $formulario->id }})"
                                                    class="inline-flex items-center px-3 py-1.5 rounded-md bg-teal-50 text-teal-600 text-xs font-medium hover:bg-teal-100 transition-colors">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 22a10 10 0 110-20 10 10 0 010 20zm1 12h-2v-2h2v2zm0-4h-2V7h2v5z">
                                                        </path>
                                                    </svg>
                                                    Ver detalles
                                                </button>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="inline-flex items-center px-3 py-1.5 rounded-md bg-amber-50 text-amber-600 text-xs font-medium hover:bg-amber-100 transition-colors">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 22a10 10 0 110-20 10 10 0 010 20zm-1-6h2v-6h-2v6zm0-8h2V7h-2v1z">
                                                        </path>
                                                    </svg>
                                                    Contrato
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-md bg-slate-50 text-slate-600 text-xs font-medium hover:bg-slate-100 transition-colors">
                                                    {{ $formulario->created_at->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 flex justify-center items-center">
                                                <a href="" download class="cursor-pointer group">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="h-6 w-6 text-blue-500 group-hover:text-blue-700 transition-all duration-300 ease-in-out transform group-hover:scale-110"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">
                                                        <path d="M12 15V3m0 12l-4-4m4 4l4-4" />
                                                        <path d="M20 16v2a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3v-2" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">

                                                @foreach ($formulario->formLinks as $link)
                                                    @if ($link->type === 'operaciones')
                                                        <a href="{{ route('formulario-operaciones', ['link' => $link->link]) }}"
                                                            target="_blank" class="text-blue-500 hover:underline">
                                                            {{ ucfirst($link->type) }}
                                                        </a><br>
                                                    @elseif ($link->type === 'financiera')
                                                        <a href="{{ route('formulario-financiera', ['link' => $link->link]) }}"
                                                            target="_blank" class="text-blue-500 hover:underline">
                                                            {{ ucfirst($link->type) }}
                                                        </a><br>
                                                    @endif
                                                @endforeach

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif



                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                            <p class="text-sm text-gray-700">
                                Mostrando <span class="font-medium">{{ $formularios->firstItem() }}</span> a <span
                                    class="font-medium">{{ $formularios->lastItem() }}</span> de <span
                                    class="font-medium">{{ $formularios->total() }}</span> entradas
                            </p>
                            <div class="flex items-center space-x-2">
                                <button wire:click="previousPage"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                                    {{ $formularios->onFirstPage() ? 'disabled' : '' }}>
                                    Anterior
                                </button>
                                <div class="flex items-center space-x-2">
                                    @foreach ($formularios->getUrlRange(1, $formularios->lastPage()) as $page => $url)
                                        <button wire:click="gotoPage({{ $page }})"
                                            class="px-4 py-2 text-sm font-medium {{ $page == $formularios->currentPage() ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border border-gray-300' }} rounded-lg hover:bg-gray-50">
                                            {{ $page }}
                                        </button>
                                    @endforeach
                                </div>
                                <button wire:click="nextPage"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                                    {{ $formularios->hasMorePages() ? '' : 'disabled' }}>
                                    Siguiente
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                @if ($selectedFormulario)
                    <div x-data="{
                        open: @entangle('open')
                    }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
                        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div class="relative min-h-screen flex items-center justify-center p-4">
                            <div
                                class="relative bg-white rounded-lg shadow-inner max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                                <div
                                    class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center">
                                    <h2 class="text-xl font-semibold text-gray-800">Información Detallada</h2>
                                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="max-w-4xl mx-auto p-6 space-y-6 bg-blue-50">
                                    <!-- Información del Negocio -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información del Negocio
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Código del cliente
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->infonegocio->codigo_cliente ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Nombre</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->infonegocio->nombre ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Correo electrónico
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->infonegocio->correo ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Número de celular</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->infonegocio->numero_celular ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">N° Oportunidad CRM
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->infonegocio->n_oportunidad_crm ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- tipo contrato  --}}
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Tipo de contrato</h2>
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->tipo_contrato ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gerente de producto -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Gerente de producto</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Línea</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->linea ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Código de la línea
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->codigo_linea ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Nombre</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->nombre ?? 'No especificado' }}</p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Teléfono</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->telefono ?? 'No especificado' }}</p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Correo electrónico
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->correo_electronico ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>

                                            <div class="mt-8 pt-6 border-t border-slate-200">
                                                <h3 class="text-sm font-medium text-slate-900 mb-4">Información
                                                    adiccional (si se requiere)</h3>
                                                <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Nombre</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->otro ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Telefono</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->cel ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Correo
                                                            electrónico</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->email ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-8 pt-6 border-t border-slate-200">
                                                <h3 class="text-sm font-medium text-slate-900 mb-4">Información del
                                                    Director</h3>
                                                <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Director</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->director ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Teléfono</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->numero ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Correo
                                                            electrónico</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $selectedFormulario->correo_director ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Orden de compra -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Orden de compra</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Fecha</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ \Carbon\Carbon::parse($selectedFormulario->fecha)->format('Y-m-d') ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">N° OC</p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->n_oc ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Precio de venta</p>
                                                    <p class="text-sm text-slate-900">
                                                        $ {{ $selectedFormulario->precio_venta ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Adjuntar cotización
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        {{ $selectedFormulario->adjunto_cotizacion ?? 'No especificado' }}
                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Información de Entrega -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información de Entrega
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                @foreach ($this->selectedFormulario->informacion as $informacion)
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Quién realiza la
                                                            entrega a cliente?</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->realiza_entrega_cliente ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Lugar de entrega
                                                            y dirección</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->lugar_entrega ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Especificar país
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->pais ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    {{-- <div class="space-y-1">
                                                        <p class="text-sm font-medium text-slate-600">Puerto</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->puerto ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div> --}}

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Tiempo de entrega
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->tiempo_entrega ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha inicio
                                                            término de entrega</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ \Carbon\Carbon::parse($informacion->fecha_inicio_termino)->format('Y-m-d') ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Tipo de incoterms
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->tipo_incoterms ?? 'No especificado' }}</p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- logística -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Logística</h2>
                                        </div>

                                        <div class="p-6">
                                            @foreach ($this->selectedFormulario->infoEntrega as $infoEntrega)
                                                <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                    <!-- Icoterm -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Icoterm</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->incoterm ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Puerto -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Puerto</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->puerto ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Transporte -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Transporte</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->transporte ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Origen -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Origen</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->origen ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Destino -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Destino</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->destino ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Condiciones -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Condiciones de
                                                            entrega local</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->condiciones ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Otros -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Otros</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $infoEntrega->otros ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Información del Servicio -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información del Servicio
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                @foreach ($this->selectedFormulario->informacion as $informacion)
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Servicio a
                                                            prestar</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->servicio_a_prestar ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Frecuencia de
                                                            suministro</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $informacion->frecuencia_suministro ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha de inicio
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ \Carbon\Carbon::parse($informacion->fecha_inicio)->format('Y-m-d') ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha de
                                                            finalización</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ \Carbon\Carbon::parse($informacion->fecha_finalizacion)->format('Y-m-d') ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Productos -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Productos</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                @foreach ($this->selectedFormulario->informacion as $informacion)
                                                    @foreach ($informacion->producto as $producto)
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium text-black whitespace-nowrap mb-2">
                                                                Anexar detalle de los equipos que se van a entregar.</p>
                                                            <p class="text-sm text-slate-900 whitespace-nowrap">
                                                                {{ $producto->detalles_equipos ?? 'No especificado' }}
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Garantia -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Garantias</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="flex space-x-8">
                                                @foreach ($this->selectedFormulario->informacion as $informacion)
                                                    @foreach ($informacion->producto as $producto)
                                                        <div class="space-y-1 w-1/2">
                                                            <p class="text-sm font-medium text-black">¿Aplica algún
                                                                tipo de garantía?</p>
                                                            <p class="text-sm text-slate-900">
                                                                {{ $producto->aplica_garantia ?? 'No especificado' }}
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>


                                                        <div class="space-y-1 w-1/2">
                                                            <p class="text-sm font-medium text-black">¿Cuál es el
                                                                termino de la garantía?</p>
                                                            <p class="text-sm text-slate-900">
                                                                {{ $producto->termino_garantia ?? 'No especificado' }}
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- condiciones de pago  --}}
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Condiciones Pago</h2>
                                        </div>
                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                @foreach ($this->selectedFormulario->financiera as $financiera)
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Forma De Pago</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->forma_pago ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    {{-- <div class="space-y-1">
                                                        <p class="text-sm font-medium text-slate-600">Fecha de cada pago</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $this->selectedFormulario->pago->fecha_pago ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div> --}}

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Plazo</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->plazo ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Moneda</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->moneda ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Garantías de
                                                            Crédito</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->garantiascredit ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Incluye IVA?</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $this->selectedFormulario->pago->isNotEmpty() && $this->selectedFormulario->pago->first()->incluye_iva ? 'Sí' : 'No' }}
                                                        </p>

                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Hay existencia
                                                            de anticipo?</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->existencia_anticipo ? 'Sí' : 'No' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Qué porcentaje?
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            {{-- {{ $financiera->porcentaje ?? 'No especificado' }} --}}
                                                            {{ number_format($financiera->porcentaje ?? 0, 0) ?? 'No especificado' }}
                                                            %

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha de pago del
                                                            anticipo</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ \Carbon\Carbon::parse($financiera->fecha_pago)->format('Y-m-d') ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Otros</p>
                                                        <p class="text-sm text-slate-900">
                                                            {{ $financiera->otros ?? 'No especificado' }}
                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pólizas -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Pólizas</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                @foreach ($this->selectedFormulario->informacion as $informacion)
                                                    @foreach ($informacion->producto as $producto)
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium text-black whitespace-nowrap mb-2">
                                                                ¿Aplica algún tipo de póliza?
                                                            <p class="text-sm text-slate-900 whitespace-nowrap">
                                                                {{ $producto->aplica_poliza ?? 'No especificado' }}
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium text-black whitespace-nowrap mb-2">
                                                                ¿Cuál es el porcentaje?
                                                            <p class="text-sm text-slate-900 whitespace-nowrap">
                                                                {{-- {{ $producto->porcentaje_poliza ?? 'No especificado' }} --}}
                                                                {{ number_format($producto->porcentaje_poliza ?? 0, 0) ?? 'No especificado' }}
                                                                %

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Archivos Adjuntos -->
                                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 mt-6">
                                        <div
                                            class="border-b border-slate-200 px-6 py-4 bg-gradient-to-r from-indigo-50 to-white">
                                            <h2 class="text-lg font-semibold text-gray-800">Archivos Adjuntos</h2>
                                        </div>

                                        <div class="p-6">
                                            @if ($selectedFormulario->documento->count() > 0)
                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                                    @foreach ($selectedFormulario->documento as $documento)
                                                        <div
                                                            class="bg-white border border-slate-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                                                            <div
                                                                class="p-4 flex items-center justify-between border-b border-slate-100">
                                                                <div class="flex items-center space-x-3">
                                                                    <div class="bg-indigo-50 p-2 rounded-lg">
                                                                        <i
                                                                            class="fas fa-{{ $this->getFileIcon($documento->nombre_original) }} text-3xl text-indigo-600"></i>
                                                                    </div>
                                                                    <div>
                                                                        <p
                                                                            class="text-sm font-medium truncate max-w-[200px]">
                                                                            {{ $documento->nombre_original }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="p-4 text-center">
                                                                <a href="{{ asset('storage/' . $documento->ruta_documento) }}"
                                                                    target="_blank"
                                                                    class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-md text-xs transition-colors duration-300 flex items-center">
                                                                    <i class="ri-eye-line mr-1"></i>
                                                                    Ver
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                {{-- Commented out section remains the same as original --}}
                                                {{-- @if ($selectedFormulario->documento->count() > 3)
                                                    <div class="mt-4 text-center">
                                                        <button wire:click="toggleMostrarMas" class="text-blue-600 hover:text-blue-800 transition-colors">
                                                            {{ $mostrarMas ? 'Mostrar menos' : 'Mostrar todos los archivos' }}
                                                            ({{ $selectedFormulario->documento->count() }})
                                                        </button>
                                                    </div>
                                                @endif --}}
                                            @else
                                                <div class="text-center text-gray-500 p-4 bg-gray-100 rounded-lg">
                                                    <p>No se han adjuntado archivos para este formulario.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- <button
                                        wire:click="closeModal"
                                        class="px-4 py-2 bg-gray-600 text-white rounded-lg">
                                        Cerrar
                                    </button> --}}
                                </div>
                            </div>

                        </div>
                @endif


        </div>
    </x-app-layout>
</div>
