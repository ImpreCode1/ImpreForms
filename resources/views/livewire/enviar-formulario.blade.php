<div>
    <x-app-layout>

        {{-- <div class="py-12"> --}}


        <div class="font-sans text-gray-900 antialiased">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form class="space-y-8">

                    <div id="step1" class="{{ $currentStep === 1 ? '' : 'hidden' }} form-step">
                        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8 tracking-tight">
                            Información Proporcionada por Marcas
                        </h1>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Información del Negocio -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Información de Negocio
                                </h2>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Codigo Cliente</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text" wire:model.live="requestedBy"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestedBy')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Correo</label>
                                        <input type="email" wire:model.live="position"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('position')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Numero celular
                                            cliente</label>
                                        <input type="text" wire:model.live="maxCompletionDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('maxCompletionDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">N° oportunidad
                                            CRM:</label>
                                        <input type="text" wire:model.live="hour"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('hour')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Orden Compra Cliente -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                    Orden Compra Cliente
                                </h2>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Fecha</label>
                                        <input type="date" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">N° OC</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Precio de venta que debe
                                            quedar
                                            en el contrato</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Adjuntar
                                            cotización</label>
                                        <input type="file" wire:model.live="clientCode"
                                            class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tipo de Contrato -->
                        <div class="bg-gray-50 p-6 rounded-lg mt-6">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Tipo de Contrato
                            </h2>

                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Soluciones</label>
                                    <select wire:model.live="contractType"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccionar Solución</option>
                                        <option value="huawei">Soluciones</option>
                                        <option value="huawei">Líneas Huawei EBG, Datacenter y Solar, líneas de paneles
                                            solares</option>
                                        <option value="datacenter">Oportunidades cerradas con condiciones particulares
                                        </option>
                                        <option value="solar">Productos que no sean de línea para un negocio específico
                                        </option>
                                    </select>
                                    @error('contractType')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Gerente de producto -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Gerente de producto
                            </h2>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Linea</label>
                                    <input type="text" wire:model.live="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Código de la línea</label>
                                    <input type="text" wire:model.live="clientName"
                                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" />


                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="number" wire:model.live="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Teléfono</label>
                                    <input type="text" wire:model.live="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200m ml-4" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input type="text" wire:model.live="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Otro</label>
                                    <input type="text" wire:model.live="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" placeholder="Opcional" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="text" wire:model.live="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" placeholder="Opcional"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Correo electrónico</label>
                                    <input type="text" wire:model.live="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" placeholder="Opcional" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Director</label>
                                    <input type="text" wire:model.live="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Teléfono</label>
                                    <input type="text" wire:model.live="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input type="text" wire:model.live="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                </div>



                            </div>
                        </div>

                        {{-- Información de Entrega --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-yellow-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8.25l1.88 3.81 4.19.61-3.03 2.95.72 4.18L12 17.19l-3.76 1.97.72-4.18-3.03-2.95 4.19-.61L12 8.25z" />
                                    </svg>

                                    Información de Entrega
                                </h2>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Quién realiza la
                                            entrega a
                                            cliente?</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Lugar de entrega y
                                            dirección</label>
                                        <input type="text" wire:model.live="requestedBy"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestedBy')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Especificar país</label>
                                        <input type="text" wire:model.live="position"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('position')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tiempo de
                                            entrega</label>
                                        <input type="time" wire:model.live="maxCompletionDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('maxCompletionDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Fecha de inicio del término de entrega (día, mes, año)</label>
                                        <input type="date" wire:model.live="maxCompletionDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('maxCompletionDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Qué tipo de incoterms
                                            aplica?</label>
                                        <input type="text" wire:model.live="maxCompletionDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('maxCompletionDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Información del Servicio -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.25 12a3.25 3.25 0 11-4.5 0 3.25 3.25 0 014.5 0zm4.56 7.44a7.5 7.5 0 00-13.62 0M18 8a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>

                                    Información del Servicio
                                </h2>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Qué servicio se va a
                                            prestar?</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Cada cuanto se va a
                                            suministrar?</label>
                                        <input type="text" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                                        <input type="date" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Fecha de
                                            finalización</label>
                                        <input type="date" wire:model.live="requestDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('requestDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <br>



                            </div>
                        </div>

                        <!-- Botón Siguiente -->
                        <div class="flex justify-center">
                            <button wire:click="changeStep(2)" type="button"
                                class="
                                        bg-gradient-to-r from-blue-500 to-blue-700
                                        text-white font-bold py-3 px-8
                                        rounded-full
                                        hover:from-blue-600 hover:to-blue-800
                                        transition duration-300
                                        transform hover:scale-105
                                        flex items-center space-x-3
                                    ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Siguiente paso </span>
                            </button>
                        </div>
                    </div>

                    <div id="step2" class="{{ $currentStep === 2 ? '' : 'hidden' }} form-step">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Productos Section -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16l2 12H6L4 6z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18a2 2 0 100 4 2 2 0 000-4zM18 18a2 2 0 100 4 2 2 0 000-4z" />
                                    </svg>
                                    Productos
                                </h2>
                                <div class="grid gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Detalles de los equipos
                                            a
                                            entregar</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                </div>
                            </div>

                            <!-- Garantías Section -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-orange-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 2l4 7h-8l4-7z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 9v10c0 1.105 1.025 2 2.267 2.233L12 22l3.733-2.767C16.975 21 18 20.105 18 19V9l-6 4-6-4z" />
                                    </svg>
                                    Garantías
                                </h2>
                                <div class="grid gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            garantía?</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Cuál es el término de
                                            la
                                            garantía?</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Condiciones de Pago Section -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 14h6m-3-3v6" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 2v6h6" />
                                    </svg>
                                    Condiciones de Pago
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Forma de Pago</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Fecha de cada
                                            pago</label>
                                        <input type="date" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Moneda</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Incluye IVA?</label>
                                        <select wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="">Seleccione</option>
                                            <option value="si">Sí</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Hay existencia de
                                            anticipo?</label>
                                        <select wire:model.live="hasAdvancePayment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="">Seleccione</option>
                                                <option value="si" wire:click="setAdvancePayment('si')">Sí</option>
                                                <option value="no" wire:click="setAdvancePayment('no')">No</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Otros</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>

                                    <div id="advancePaymentFields" class="{{ $hasAdvancePayment === 'si' ? '' : 'hidden' }} space-y-4">
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Fecha de cada
                                                pago</label>
                                            <input type="date" wire:model.live="clientCode"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />

                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Moneda</label>
                                            <input type="text" wire:model.live="clientCode"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pólizas Section -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 3H5c-1.104 0-2 .896-2 2v14c0 1.104.896 2 2 2h14c1.104 0 2-.896 2-2V5c0-1.104-.896-2-2-2z" />
                                    </svg>
                                    Pólizas
                                </h2>
                                <div class="grid gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            póliza?</label>
                                        <input type="text" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">¿Cuál es el
                                            porcentaje?</label>
                                        <input type="number" step="0.01" wire:model.live="clientCode"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Área de Archivos -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Adjuntar Documentos
                            </h2>

                            <div class="border-dashed border-2 border-gray-300 p-6 text-center">
                                <input type="file" wire:model="attachments" multiple class="hidden"
                                    id="file-upload" accept=".pdf,.doc,.docx,.xls,.xlsx" />
                                <label for="file-upload" class="cursor-pointer">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-600">
                                            Arrastra y suelta archivos aquí o
                                            <span class="text-blue-600 hover:underline">selecciona archivos</span>
                                        </p>
                                        <p class="text-sm text-gray-500 mt-2">
                                            Archivos permitidos: (PDF, DOC, XLSX - Máximo 10MB) o <span
                                                class="text-xs">correo electrónico (con formato válido)</span>

                                        </p>
                                    </div>
                                </label>
                            </div>

                            {{-- @if ($attachments) --}}
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-2">Archivos Seleccionados:</h3>
                                <ul class="space-y-2">
                                    {{-- @foreach ($attachments as $file) --}}
                                    <li class="bg-white p-2 rounded-md flex justify-between items-center shadow-sm">
                                        {{-- <span class="text-sm truncate">{{ $file->getClientOriginalName() }}</span>  --}}
                                        {{-- <button type="button" wire:click="removeAttachment('{{ $file->getFilename() }}')" class="text-red-500 hover:text-red-700"> --}}
                                        ✕
                                        {{-- </button> --}}
                                    </li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                            {{-- @endif --}}
                        </div>

                        <div class="flex justify-center space-x-4">

                            <button wire:click="changeStep(1)" type="button"
                                class="
                                bg-gradient-to-r from-gray-500 to-gray-700
                                text-white font-bold py-3 px-8
                                rounded-full
                                hover:from-gray-600 hover:to-gray-800
                                transition duration-300
                                transform hover:scale-105
                                flex items-center space-x-3
                            ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12l-2-2-4 4m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Atrás</span>
                            </button>
                            <button wire:click="" type="button"
                                class="
                                    bg-gradient-to-r from-blue-500 to-blue-700
                                    text-white font-bold py-3 px-8
                                    rounded-full
                                    hover:from-blue-600 hover:to-blue-800
                                    transition duration-300
                                    transform hover:scale-105
                                    flex items-center space-x-3
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Enviar Formulario</span>
                            </button>



                        </div>

                    </div>
                </form>
            </div>
        </div>
</div>
</x-app-layout>

</div>
