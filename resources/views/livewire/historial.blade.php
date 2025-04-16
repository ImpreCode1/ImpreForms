<div>
    <x-app-layout>

        <br>
        <br>

        <h1 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
            Historial de formularios
        </h1>

        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-max border-collapse text-left">
                        <tbody class="divide-y divide-slate-100">
                            @if ($formularios->isEmpty())
                                <div class="rounded-lg border-2 border-dashed border-slate-300 bg-white p-8">
                                    <div class="text-center">

                                        <div
                                            class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-slate-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V19.5a2.25 2.25 0 002.25 2.25h.75">
                                                </path>
                                            </svg>
                                        </div>

                                        <h3 class="mt-4 text-lg font-medium text-slate-900">
                                            No hay formularios creados
                                        </h3>

                                        <p class="mt-2 text-sm text-slate-600">
                                            Aquí aparecerán los formularios una vez que comiences a crearlos.
                                        </p>

                                        <div class="mt-6">
                                            <button onclick="window.location.href = '{{ route('menu') }}'"
                                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                Crear nuevo formulario
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <thead>
                                    <tr class="bg-gradient-to-r from-slate-50 to-blue-50">
                                        <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Codigo
                                            Cliente</th>
                                        <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Tipo de
                                            solicitud
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">N OC</th> --}}
                                        <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Archivos
                                            adjuntos
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Fecha
                                            Envio</th> --}}
                                        <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Estado
                                        </th>
                                        <th scope="col" class="px-6 py-5 text-sm font-semibold text-slate-900">Acciones
                                        </th>
                                    </tr>
                                </thead>

                                @foreach ($formularios as $formulario)
                                    <tr class="group transition-colors hover:bg-slate-50/70">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="h-8 w-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="font-medium text-slate-900">{{ $formulario->infonegocio->codigo_cliente }}</span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-md bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-600">
                                                {{ $formulario->tipo_solicitud }}
                                            </span>
                                        </td>

                                        {{-- <td class="px-6 py-4">
                                            <span class="text-sm font-medium text-slate-900">{{ $formulario->n_oc }}</span>
                                        </td> --}}

                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1.5 max-w-md p-2 rounded-lg bg-slate-50/50">
                                                @php
                                                    $documentos = $formulario->documento;
                                                    $totalDocumentos = $documentos->count();
                                                @endphp

                                                @if ($totalDocumentos > 1)
                                                    <div class="relative">
                                                        <!-- Main document item -->
                                                        <a href="{{ asset('storage/' . $documentos->first()->ruta_documento) }}"
                                                            target="_blank"
                                                            class="group flex items-center gap-2 p-2.5 rounded-md bg-white shadow-sm border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                                            <div class="flex items-center gap-2 flex-1 min-w-0">
                                                                <div
                                                                    class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 group-hover:bg-blue-100 transition-colors">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="w-4 h-4 text-blue-500" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="min-w-0 flex-1">
                                                                    <span
                                                                        class="block text-sm font-medium text-slate-700 group-hover:text-blue-600 truncate">
                                                                        {{ $documentos->first()->nombre_original }}
                                                                    </span>
                                                                    <span class="text-xs text-slate-400">
                                                                        {{ $totalDocumentos - 1 }} documentos adicionales
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <button wire:click="toggleMostrarMas"
                                                            class="absolute right-2.5 top-2.5 flex items-center gap-1 px-2 py-1 rounded-full bg-slate-100 hover:bg-blue-100 transition-all duration-200">
                                                            <span
                                                                class="text-xs font-semibold {{ $mostrarMas ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                                                                {{ $mostrarMas ? 'Ocultar' : 'Ver' }}
                                                            </span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-3.5 h-3.5 transform transition-transform duration-200 {{ $mostrarMas ? 'rotate-180 text-blue-600' : 'text-slate-400 group-hover:text-blue-600' }}"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M19 9l-7 7-7-7" />
                                                            </svg>
                                                        </button>


                                                        @if ($mostrarMas)
                                                            <div
                                                                class="mt-2 space-y-2 overflow-hidden transition-all duration-300">
                                                                @foreach ($documentos->skip(1) as $documento)
                                                                    <a href="{{ asset('storage/' . $documento->ruta_documento) }}"
                                                                        target="_blank"
                                                                        class="group flex items-center gap-2 p-2.5 rounded-md bg-white shadow-sm border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                                                        <div
                                                                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-50 group-hover:bg-blue-50 transition-colors">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-4 h-4 text-slate-400 group-hover:text-blue-500"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="min-w-0 flex-1">
                                                                            <span
                                                                                class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 truncate">
                                                                                {{ $documento->nombre_original }}
                                                                            </span>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @elseif($totalDocumentos === 1)
                                                    @foreach ($documentos as $documento)
                                                        <a href="{{ asset('storage/' . $documento->ruta_documento) }}"
                                                            target="_blank"
                                                            class="group flex items-center gap-2 p-2.5 rounded-md bg-white shadow-sm border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all duration-200">
                                                            <div
                                                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-50 group-hover:bg-blue-50 transition-colors">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 text-slate-400 group-hover:text-blue-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                </svg>
                                                            </div>
                                                            <div class="min-w-0 flex-1">
                                                                <span
                                                                    class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 truncate">
                                                                    {{ $documento->nombre_original }}
                                                                </span>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <div
                                                        class="flex items-center gap-3 p-3 rounded-md bg-slate-50 border border-slate-200">
                                                        <div
                                                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 text-slate-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <span class="block text-sm font-medium text-slate-600">No hay
                                                                documentos</span>
                                                            <span class="text-xs text-slate-400">No se han adjuntado
                                                                documentos</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1.5 rounded-md bg-{{ $formulario->estado == 'Completado' ? 'green' : 'amber' }}-50 px-3 py-1.5 text-xs font-medium text-{{ $formulario->estado == 'Completado' ? 'green' : 'amber' }}-600">
                                                {{ $formulario->estado }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4">
                                            {{-- @dd($formulario) --}}
                                            <div x-data="{ showModal: false, formularioId: {{ $formulario->id }} }" class="relative">
                                                <button @click="showModal = true"
                                                    class="group inline-flex items-center justify-center rounded-full border border-transparent bg-emerald-50/50 p-1.5 text-emerald-600 hover:bg-emerald-100 hover:text-emerald-700 ring-0 transition-all duration-200 hover:shadow-lg hover:shadow-emerald-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-4 w-4 transform transition-transform group-hover:scale-110">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l3.621 3.621a2.25 2.25 0 010 3.182l-8.465 8.465a2.25 2.25 0 01-1.306.615l-4.404.845a2.25 2.25 0 01-2.697-2.698l.845-4.404a2.25 2.25 0 01.615-1.306l8.465-8.465a2.25 2.25 0 013.182 0z" />
                                                    </svg>
                                                </button>


                                                <!-- Modal con diseño moderno -->
                                                <div x-show="showModal" x-cloak @keydown.escape.window="showModal = false"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0" class="fixed inset-0 z-50">

                                                    <!-- Backdrop con blur moderno -->
                                                    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
                                                        aria-hidden="true" @click="showModal = false">
                                                    </div>

                                                    <!-- Contenedor del Modal -->
                                                    <div class="fixed inset-0 z-50 overflow-y-auto">
                                                        <div class="flex min-h-screen items-center justify-center p-4 ">
                                                            <!-- Panel del Modal -->
                                                            <div x-transition:enter="transition ease-out duration-300 transform"
                                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave="transition ease-in duration-200 transform"
                                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                class="relative transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all max-w-4xl w-full">

                                                                <!-- Header elegante -->
                                                                <div class="relative px-6 pt-7 pb-4">
                                                                    <h3 class="text-2xl font-semibold text-gray-900">
                                                                        Editar Formulario
                                                                    </h3>
                                                                    <div class="absolute right-6 top-6">
                                                                        <button
                                                                            @click="showModal = false; Livewire.emit('resetForm')"
                                                                            class="rounded-full p-2 inline-flex text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition-all duration-200">
                                                                            <span class="sr-only">Cerrar</span>
                                                                            <svg class="h-6 w-6" fill="none"
                                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M6 18L18 6M6 6l12 12" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <!-- Línea divisoria con gradiente -->
                                                                <div
                                                                    class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent">
                                                                </div>

                                                                <!-- Contenido del Modal -->
                                                                <div
                                                                    class="px-6 py-8 max-h-[calc(100vh-200px)] overflow-y-auto">
                                                                    <div class="space-y-6">
                                                                        <livewire:editar-formulario :formulario="$formulario"
                                                                            wire:key="edit-{{ $formulario->id }}" />
                                                                    </div>
                                                                </div>

                                                                <!-- Footer moderno -->
                                                                <div
                                                                    class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
            <script>
                document.addEventListener('livewire:load', function() {
                    window.Livewire = Livewire;
                    Livewire.on('formularioUpdated', () => {
                        showModal = false;
                    });
                });
            </script>
        </div>
    </x-app-layout>
</div>
