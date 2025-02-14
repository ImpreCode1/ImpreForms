<div>
    <x-app-layout>
        {{-- <div class="py-12"> --}}
        <div class="font-sans text-gray-900 antialiased">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit.prevent="submit" id="operacionesForm" class="space-y-8">

                    <div id="step1" class="{{ $currentStep === 1 ? '' : 'hidden' }} form-step">
                        <h1 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
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
                                        <label for= "negocio" class="block text-sm font-medium text-gray-700">Codigo
                                            Cliente</label>

                                        <input type="text" wire:model="negocio"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('negocio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('negocio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nombre"
                                            class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input id="nombre" wire:model="nombre" type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nombre') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('nombre')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Correo</label>
                                        <input id="correo" type="email" wire:model="correo"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('correo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('correo')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="numero" class="block text-sm font-medium text-gray-700">Numero
                                            celular
                                            cliente</label>
                                        <input numero type="text" wire:model="numero"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('numero') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('numero')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="crm" class="block text-sm font-medium text-gray-700">N°
                                            oportunidad
                                            CRM:</label>
                                        <input id="crm" type="text" wire:model="crm"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('crm') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('crm')
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
                                        <label for="fecha"
                                            class="block text-sm font-medium text-gray-700">Fecha</label>
                                        <input id="fecha" type="date" wire:model="fecha"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('fecha')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="oc" class="block text-sm font-medium text-gray-700">N°
                                            OC</label>
                                        <input id="oc" type="text" wire:model="oc"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('oc') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('oc')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="precio" class="block text-sm font-medium text-gray-700">Precio de
                                            venta que debe
                                            quedar
                                            en el contrato</label>
                                        <input id="precio" type="text" wire:model="precio" maxlength="10"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('precio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('precio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="cotizacion" class="block text-sm font-medium text-gray-700">Adjuntar
                                            cotización</label>
                                        <input id="cotizacion" type="file" wire:model="cotizacion"
                                            class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
                                        @error('cotizacion')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
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
                                    <label for="soluciones"
                                        class="block text-sm font-medium text-gray-700">Soluciones</label>
                                    <select id="soluciones" wire:model="soluciones"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('soluciones') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccionar Solución</option>
                                        {{-- <option value="huawei">Soluciones</option> --}}
                                        <option value="huawei">Líneas Huawei EBG, Datacenter y Solar, líneas de paneles
                                            solares</option>
                                        <option value="datacenter">Oportunidades cerradas con condiciones particulares
                                        </option>
                                        <option value="solar">Productos que no sean de línea para un negocio
                                            específico
                                        </option>
                                    </select>
                                    @error('soluciones')
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

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="linea"
                                        class="block text-sm font-medium text-gray-700">Linea</label>
                                    <input id="linea" type="text" wire:model="linea"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('linea') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('linea')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="codlinea" class="block text-sm font-medium text-gray-700">Código de la
                                        línea</label>
                                    <input id="codlinea" type="text" wire:model="codlinea"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('codlinea') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('codlinea')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nomgerente"
                                        class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input id="nomgerente" type="text" wire:model="nomgerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nomgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('nomgerente')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="telgerente"
                                        class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input id="telgerente" type="text" wire:model="telgerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('telgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('telgerente')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="corgerente" class="block text-sm font-medium text-gray-700">Correo
                                        electrónico</label>
                                    <input id="corgerente" type="text" wire:model="corgerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('corgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('corgerente')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Otro</label>
                                    <input type="text" wire:model="clientcode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                        placeholder="Opcional" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="text" wire:model="clientname"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                        placeholder="Opcional" />
                                    @error('clientname')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input type="text" wire:model="mail"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                        placeholder="Opcional" />
                                    @error('mail')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="director"
                                        class="block text-sm font-medium text-gray-700">Director</label>
                                    <input id="director" type="text" wire:model="director"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('director') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('director')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tel2gerente"
                                        class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input id="tel2gerente" type="text" wire:model="tel2gerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tel2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('tel2gerente')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="cor2gerente" class="block text-sm font-medium text-gray-700">Correo
                                        electrónico</label>
                                    <input id="cor2gerente" type="text" wire:model="cor2gerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cor2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('cor2gerente')
                                        <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                                    @enderror
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
                                        <label for="entregacliente"
                                            class="block text-sm font-medium text-gray-700">¿Quién realiza la
                                            entrega a
                                            cliente?</label>
                                        <input id="entregacliente" type="text" wire:model="entregacliente"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('entregacliente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('entregacliente')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="lugarentrega"
                                            class="block text-sm font-medium text-gray-700">Lugar de entrega y
                                            dirección</label>
                                        <input id="lugarentrega" type="text" wire:model="lugarentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('lugarentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('lugarentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="espais"
                                            class="block text-sm font-medium text-gray-700">Especificar país</label>
                                        <input id="espais" type="text" wire:model="espais"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('espais') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('espais')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div>
                                        <label for="tiempoentrega"
                                            class="block text-sm font-medium text-gray-700">Tiempo de
                                            entrega</label>
                                        <input id="tiempoentrega" type="time" wire:model="tiempoentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tiempoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('tiempoentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="terminoentrega"
                                            class="block text-sm font-medium text-gray-700">Fecha de inicio del término
                                            de entrega (día, mes, año)</label>
                                        <input id="terminoentrega" type="date" wire:model="terminoentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('terminoentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="tipoicoterm" class="block text-sm font-medium text-gray-700">¿Qué
                                            tipo de incoterms
                                            aplica?</label>
                                        <input id="tipoicoterm" type="text" wire:model="tipoicoterm"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tipoicoterm') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('tipoicoterm')
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
                                        <label for="prestar" class="block text-sm font-medium text-gray-700">¿Qué
                                            servicio se va a
                                            prestar?</label>
                                        <input id="prestar" type="text" wire:model="prestar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('prestar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('prestar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="suministrar" class="block text-sm font-medium text-gray-700">¿Cada
                                            cuanto se va a
                                            suministrar?</label>
                                        <input id="suministrar" type="text" wire:model="suministrar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('suministrar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('suministrar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="inicio" class="block text-sm font-medium text-gray-700">Fecha de
                                            inicio</label>
                                        <input id="inicio" type="date" wire:model="inicio"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('inicio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('inicio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="finalizacion"
                                            class="block text-sm font-medium text-gray-700">Fecha de
                                            finalización</label>
                                        <input id="finalizacion" type="date" wire:model="finalizacion"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('finalizacion') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('finalizacion')
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
                                class="group relative bg-blue-600 py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-3 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-600 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                </div>
                                <span class="relative font-semibold text-white">Siguiente paso</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="relative h-5 w-5 text-white"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
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
                                        <label for="details" class="block text-sm font-medium text-gray-700">Detalles
                                            de los equipos
                                            a
                                            entregar</label>
                                        <input id="details" type="text" wire:model="details"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('details') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('details')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
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
                                        <label for="    garantia"
                                            class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            garantía?</label>
                                        <input id="aplicagarantia" type="text" wire:model="aplicagarantia"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicagarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('aplicagarantia')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="terminogarantia"
                                            class="block text-sm font-medium text-gray-700">¿Cuál es el término de
                                            la
                                            garantía?</label>
                                        <input id="terminogarantia" type="text" wire:model="terminogarantia"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminogarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('terminogarantia')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
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
                                        <label for="formapago" class="block text-sm font-medium text-gray-700">Forma
                                            de Pago</label>
                                        <input id="formapago" type="text" wire:model="formapago"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('formapago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('formapago')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="fecha_pago" class="block text-sm font-medium text-gray-700">Fecha
                                            de Pago</label>
                                        <input id="fecha_pago" type="date" wire:model="fecha_pago"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('fecha_pago')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="moneda"
                                            class="block text-sm font-medium text-gray-700">Moneda</label>
                                        <input id="moneda" type="text" wire:model="moneda"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('moneda') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('moneda')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="incluye_iva"
                                            class="block text-sm font-medium text-gray-700">¿Incluye IVA?</label>
                                        <select id="incluye_iva" wire:model="incluye_iva"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('incluye_iva') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="">Seleccione</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('incluye_iva')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="otros"
                                            class="block text-sm font-medium text-gray-700">Otros</label>
                                        <input id="otros" type="text" wire:model="otros"
                                            placeholder="Opcional"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('otros') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('otros')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
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
                                        <label id="aplicapoliza"
                                            class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            póliza?</label>
                                        <input id="aplicapoliza" type="text" wire:model="aplicapoliza"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicapoliza') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('aplicapoliza')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="porcentaje" class="block text-sm font-medium text-gray-700">¿Cuál
                                            es el
                                            porcentaje?</label>
                                        <input id="porcentaje" type="number" step="0.01" wire:model="porcentaje"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('porcentaje') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('porcentaje')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Área de Archivos -->
                        {{-- inicio subida de documentos --}}
                        <div>
                            <!-- Zona de arrastrar y soltar -->
                            <div class="border-dashed border-2 border-gray-300 p-6 text-center"
                                wire:drop.prevent="handleDrop($event.dataTransfer.files)"
                                wire:dragover.prevent="dragOver" wire:dragleave.prevent="dragLeave">
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
                                            Por favor, <span class="text-blue-600 hover:underline">seleccione los
                                                archivos
                                                que desea agregar</span>.
                                        </p>
                                        <p class="text-sm text-gray-500 mt-2">
                                            Archivos permitidos: PDF, DOC, XLSX. Tamaño máximo: 10MB.
                                        </p>
                                    </div>
                                </label>
                            </div>

                            <!-- Mensajes de error -->
                            @error('attachments.*')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <!-- Mensajes de éxito -->
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Lista de documentos -->


                            {{-- final subida de documentos  --}}
                            @if (count($files) > 0)
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-2">Archivos Seleccionados:</h3>
                                <ul class="space-y-2">
                                    @foreach ($files as $id => $file)
                                    <li wire:key="file-{{ $id }}" class="bg-gray-50 rounded-lg p-3 flex items-center justify-between group hover:bg-gray-100 transition-all duration-200">
                                        <div class="flex items-center space-x-3">
                                            <div class="p-2 bg-blue-100 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-gray-700">{{ $file['name'] }}</span>
                                                <span class="text-xs text-gray-500">{{ $file['size'] }} KB</span>
                                            </div>
                                        </div>
                                        <button
                                            type="button"
                                            wire:click="removeFile('{{ $id }}')"
                                            class="hidden group-hover:flex items-center space-x-1 text-sm text-red-500 hover:text-red-700 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Eliminar</span>
                                        </button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="flex flex-col mt-6">
                                @error('archivos.*')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror
                                <br>

                                <div class="flex flex-col mt-6">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-4 text-center">
                                            <span class="text-red-500">Parece que algunos campos del formulario aún no
                                                están completos o contienen información incorrecta.</span>
                                        </div>
                                    @endif

                                    <div class="flex justify-center space-x-6">
                                        <button wire:click="changeStep(1)" type="button"
                                            class="group relative bg-white border-2 border-gray-300 text-gray-700 py-3 px-8 rounded-xl hover:border-gray-400 shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-3">
                                            <div
                                                class="absolute inset-0 bg-gray-100 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 -z-10">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-gray-600 group-hover:text-gray-800 transition-colors duration-300"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                            </svg>
                                            <span class="font-semibold">Atrás</span>
                                        </button>

                                        <button wire:click="submit" type="button"
                                            class="group relative bg-blue-600 py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-3 overflow-hidden">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-600 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="relative h-5 w-5 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="relative font-semibold text-white">Enviar Formulario</span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div id="modalContainer">
                                    @if ($mmd)
                                        <div
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-sm">
                                            <div
                                                class="relative max-h-[90vh] w-full max-w-4xl overflow-y-auto rounded-lg border border-gray-100 bg-white p-6 shadow-xl sm:p-8">
                                                <div class="mb-6 text-center md:mb-10">
                                                    <h4 class="mb-4 text-2xl font-bold text-black md:text-3xl">Links
                                                        para
                                                        Completar Información</h4>
                                                    <p class="leading-relaxed text-gray-600">
                                                        A continuación, se generarán dos enlaces para completar la
                                                        información
                                                        faltante de las secciones de
                                                        <span class="font-semibold text-blue-600">Operaciones</span> y
                                                        <span class="font-semibold text-green-600">Financiera</span>.
                                                    </p>
                                                </div>

                                                <div
                                                    class="mb-6 rounded-r-lg border-l-4 border-amber-500 bg-amber-50 p-4 md:mb-8">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-5 w-5 text-amber-500" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-sm text-amber-700">Los enlaces tienen una
                                                                validez de
                                                                <span class="font-bold">3 días</span>. Por favor,
                                                                complete
                                                                ambos formularios dentro de este plazo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="max-h-[60vh] space-y-4 overflow-y-auto md:space-y-6">
                                                    <div class="group">
                                                        <div
                                                            class="rounded-xl border-2 border-blue-100 bg-white p-4 transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:shadow-blue-100 sm:p-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex-1">
                                                                    <div class="mb-3 flex items-center space-x-3">
                                                                        <span
                                                                            class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">Operaciones</span>
                                                                        <span class="text-sm text-gray-400">•</span>
                                                                        <span
                                                                            class="text-sm text-gray-500">Obligatorio</span>
                                                                    </div>
                                                                    <p id="operaciones"
                                                                        class="break-all text-gray-600">
                                                                        {{ session('operacionesUrl') }}</p>
                                                                </div>
                                                                <button type="button"
                                                                    onclick="copyToClipboard('{{ session('operacionesUrl') }}')"
                                                                    class="ml-4 rounded-lg p-3 text-blue-500 transition-colors duration-200 hover:bg-blue-50">
                                                                    <svg class="h-5 w-5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="group">
                                                        <div
                                                            class="rounded-xl border-2 border-green-100 bg-white p-4 transition-all duration-300 hover:border-green-300 hover:shadow-lg hover:shadow-green-100 sm:p-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex-1">
                                                                    <div class="mb-3 flex items-center space-x-3">
                                                                        <span
                                                                            class="rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">Financiera</span>
                                                                        <span class="text-sm text-gray-400">•</span>
                                                                        <span
                                                                            class="text-sm text-gray-500">Obligatorio</span>
                                                                    </div>
                                                                    <p id="financiera"
                                                                        class="break-all text-gray-600">
                                                                        {{ session('financieraUrl') }}</p>
                                                                </div>
                                                                <button type="button"
                                                                    onclick="copyToClipboard('{{ session('financieraUrl') }}')"
                                                                    class="ml-4 rounded-lg p-3 text-green-500 transition-colors duration-200 hover:bg-green-50">
                                                                    <svg class="h-5 w-5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2z" />
                                                                    </svg>
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-6 text-center text-sm text-gray-500 md:mt-8">
                                                    <p>Si no completa ambos formularios, la información no podrá ser
                                                        procesada.
                                                    </p>
                                                </div>
                                                <!-- Información adicional -->
                                                <div
                                                    class="mt-8 rounded-lg border-l-4 border-red-500 bg-red-50 p-4 shadow-md">
                                                    <div class="flex items-start">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-6 w-6 text-red-500"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 110 20 10 10 0 010-20z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <h5 class="mb-1 text-lg font-semibold text-red-700">Nota
                                                                importante
                                                            </h5>
                                                            <p class="text-sm leading-relaxed text-gray-700">Los
                                                                enlaces de
                                                                <span
                                                                    class="font-medium text-black-600">Operaciones</span>
                                                                y
                                                                <span
                                                                    class="font-medium text-black-600">Financiera</span>
                                                                se
                                                                han guardado en tu carpeta de <span
                                                                    class="font-medium">Descargas</span>. Puedes
                                                                utilizarlos
                                                                para completar la información requerida o compartirlos
                                                                con las
                                                                personas responsables.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mt-4 flex justify-end">
                                                    <button wire:click="cerrarmodal"
                                                        class="rounded-lg bg-red-500 px-4 py-2 text-white transition-colors hover:bg-red-600" type="button">Cerrar</button>
                                                </div>
                                            </div>
                                            {{-- inicio diseño de copiado en portapapeles --}}
                                            <div id="alert"
                                                class="hidden fixed bottom-5 right-5 flex items-center rounded-md bg-white h-12 px-4 py-2 text-black shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" class="mr-2">
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <path d="M16 3H4v13" />
                                                        <path d="M8 7h12v12a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2z" />
                                                    </g>
                                                </svg> Enlace Copiado.
                                            </div>
                                            <div>

                                            </div>
                                            {{-- fin diseño copiado en portapapeles --}}
                                        </div>
                                    @endif

                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
</div>

<script type="text/javascript">
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            const alertBox = document.getElementById('alert');
            alertBox.classList.remove('hidden'); // Muestra la alerta

            // Ocultar la alerta después de 2 segundos
            setTimeout(() => {
                alertBox.classList.add('hidden');
            }, 2000);
        }, function(err) {
            console.error('Error al copiar el enlace: ', err);
        });
    }

    document.getElementById('operacionesForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Obtener los enlaces de los dos elementos
        var operacionesUrl = document.getElementById("operaciones").innerText;
        var financieraUrl = document.getElementById("financiera").innerText;

        // Combinar ambos enlaces en uno solo con un salto de línea
        var combinedUrls = "LINK OPERACIONES: " + operacionesUrl + "\nLINK FINANCIERA: " + financieraUrl;


        var enlace = document.createElement("a");
        enlace.setAttribute("href", "data:text/plain;charset=utf-8," + encodeURIComponent(combinedUrls));
        enlace.setAttribute("download", "operaciones.txt");
        enlace.style.display = "none";

        // Agregar el enlace al cuerpo del documento y hacer clic en él
        document.body.appendChild(enlace);
        enlace.click();

        // Eliminar el enlace del documento
        document.body.removeChild(enlace);

        // Esperar un momento antes de enviar el formulario
        setTimeout(() => {
            this.submit();
        }, 500); // Esperar 500 milisegundos (0.5 segundos)
    });
</script>
