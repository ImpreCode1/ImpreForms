<div>
    <x-app-layout>

        {{-- <div class="py-12"> --}}


        <div class="font-sans text-gray-900 antialiased">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit.prevent="submit" class="space-y-8">

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
                                        <label for= "negocio" class="block text-sm font-medium text-gray-700">Codigo Cliente</label>

                                        <input type="text" wire:model="negocio"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('negocio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('negocio')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input id="nombre" wire:model="nombre" type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nombre') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('nombre')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Correo</label>
                                        <input id="correo" type="email" wire:model="corrreo"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('correo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('correo')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="numero" class="block text-sm font-medium text-gray-700">Numero celular
                                            cliente</label>
                                        <input numero type="text" wire:model="numero"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('numero') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('numero')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="crm" class="block text-sm font-medium text-gray-700">N° oportunidad
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
                                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                        <input id="fecha" type="date" wire:model="fecha"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('fecha')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="oc" class="block text-sm font-medium text-gray-700">N° OC</label>
                                        <input id="oc" type="text" wire:model="oc"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('oc') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('oc')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="precio" class="block text-sm font-medium text-gray-700">Precio de venta que debe
                                            quedar
                                            en el contrato</label>
                                        <input id="precio" type="text" wire:model="precio"
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
                                        @error('cotizaccion')
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
                                    <label for="soluciones" class="block text-sm font-medium text-gray-700">Soluciones</label>
                                    <select id="soluciones" wire:model="soluciones"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('soluciones') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccionar Solución</option>
                                        <option value="huawei">Soluciones</option>
                                        <option value="huawei">Líneas Huawei EBG, Datacenter y Solar, líneas de paneles
                                            solares</option>
                                        <option value="datacenter">Oportunidades cerradas con condiciones particulares
                                        </option>
                                        <option value="solar">Productos que no sean de línea para un negocio específico
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

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="linea" class="block text-sm font-medium text-gray-700">Linea</label>
                                    <input id="linea" type="text" wire:model="linea"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('linea') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error ('linea')
                             <span class="text-red-500 text-sm"> {{$message}}</span>
                             @enderror
                                    </div>
                                <div>
                                    <label for="codlinea" class="block text-sm font-medium text-gray-700 ml-4">Código de la línea</label>
                                    <input id="codlinea" type="text" wire:model="codlinea"
                                     class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('codlinea') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" />
                                     @error ('codlinea')
                                     <span class="text-red-500 text-sm"> {{$message}}</span>
                                     @enderror

                                </div>
                                <div>
                                    <label for="nomgerente" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input id="nomgerente" type="number" wire:model="nomgerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nomgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error ('nomgerente')
                                        <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>
                                <div>
                                    <label for="telgerente" class="block text-sm font-medium text-gray-700 ml-4">Teléfono</label>
                                    <input id="telgerente" type="text" wire:model="telgerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('telgerente') ? 'border-red-400' : 'border-blue-100' }}  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200m ml-4" />
                                        @error ('telgerente')
                                        <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>
                                <div>
                                    <label for="corgerente" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input id="corgerente" type="text" wire:model="corgerente"

                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('corgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error ('corgerente')
                                    <span class="text-red-500 text-sm"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Otro</label>
                                    <input type="text" wire:model="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" placeholder="Opcional" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="text" wire:model="clientName"
                                        class="mt-1 block w-full rounded-md border-gray-300  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" placeholder="Opcional"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 ml-4">Correo electrónico</label>
                                    <input type="text" wire:model="clientCode"
                                        class="mt-1 block w-full rounded-md border-gray-300  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" placeholder="Opcional" />
                                </div>
                                <div>
                                    <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                                    <input id="director" type="text" wire:model="director"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('director') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error ('director')
                                        <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>
                                <div>
                                    <label for="tel2gerente" class="block text-sm font-medium text-gray-700 ml-4">Teléfono</label>
                                    <input id="tel2gerente" type="text" wire:model="tel2gerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tel2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 ml-4" />
                                        @error ('tel2gerente')
                                        <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>

                                <div>
                                    <label for="cor2gerente" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input id="cor2gerente" type="text" wire:model="cor2gerente"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cor2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error ('cor2gerente')
                                        <span class="text-red-500 text-sm"> {{$message}}</span>
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
                                        <label for="entregacliente" class="block text-sm font-medium text-gray-700">¿Quién realiza la
                                            entrega a
                                            cliente?</label>
                                        <input id="entregacliente" type="text" wire:model="entregacliente"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('entregacliente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('entregacliente')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="lugarentrega" class="block text-sm font-medium text-gray-700">Lugar de entrega y
                                            dirección</label>
                                        <input id="lugarentrega" type="text" wire:model="lugarentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('lugarentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('lugarentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="espais" class="block text-sm font-medium text-gray-700">Especificar país</label>
                                        <input id="espais" type="text" wire:model="espais"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('espais') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('espais')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div>
                                        <label for="tiempoentrega" class="block text-sm font-medium text-gray-700">Tiempo de
                                            entrega</label>
                                        <input id="tiempoentrega" type="time" wire:model="tiempoentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tiempoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('tiempoentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="terminoentrega" class="block text-sm font-medium text-gray-700">Fecha de inicio del término de entrega (día, mes, año)</label>
                                        <input id="terminoentrega" type="date" wire:model="terminoentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('terminoentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="tipoicoterm" class="block text-sm font-medium text-gray-700">¿Qué tipo de incoterms
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
                                        <label for="prestar" class="block text-sm font-medium text-gray-700">¿Qué servicio se va a
                                            prestar?</label>
                                        <input id="prestar" type="text" wire:model="prestar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('prestar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('prestar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="suministrar" class="block text-sm font-medium text-gray-700">¿Cada cuanto se va a
                                            suministrar?</label>
                                        <input id="suministrar" type="text" wire:model="suministrar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('suministrar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('suministrar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="inicio" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                                        <input id="inicio" type="date" wire:model="inicio"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('inicio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('inicio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="finalizacion" class="block text-sm font-medium text-gray-700">Fecha de
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
                                        <label for="details" class="block text-sm font-medium text-gray-700">Detalles de los equipos
                                            a
                                            entregar</label>
                                        <input id="details" type="text" wire:model="details"

                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('details') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('details') <span class="text-red-500 text-sm"> {{$message}}</span>
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
                                        <label for="    garantia" class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            garantía?</label>
                                        <input id="aplicagarantia" type="text" wire:model="aplicagarantia"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicagarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('aplicagarantia') <span class="text-red-500 text-sm"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    <div>
                                        <label for="terminogarantia" class="block text-sm font-medium text-gray-700">¿Cuál es el término de
                                            la
                                            garantía?</label>
                                        <input id="terminogarantia" type="text" wire:model="terminogarantia"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminogarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('terminogarantia') <span class="text-red-500 text-sm"> {{$message}}</span>
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
                                        <label for="formapago" class="block text-sm font-medium text-gray-700">Forma de Pago</label>
                                        <input id="formapago" type="text" wire:model="formapago"

                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('formapago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('formapago') <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="fechapago" class="block text-sm font-medium text-gray-700">Fecha de cada
                                            pago</label>
                                        <input id="fechapago" type="date" wire:model="fechapago"

                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fechapago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('fechapago') <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="moneda" class="block text-sm font-medium text-gray-700">Moneda</label>
                                        <input id="moneda" type="text" wire:model="moneda"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('moneda') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('moneda') <span class="text-red-500 text-sm"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    <div>
                                        <label for="iva" class="block text-sm font-medium text-gray-700">¿Incluye IVA?</label>
                                        <select id="iva" wire:model="iva"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('iva') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="">Seleccione</option>
                                            <option value="si">Sí</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('iva') <span class="text-red-500 text-sm"> {{$message}}</span>
                                        @enderror
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
                                        <label for="others" class="block text-sm font-medium text-gray-700">Otros</label>
                                        <input id="others" type="text" wire:model="others"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('others') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('others') <span class="text-red-500 text-sm"> {{$message}}</span>
                                            @enderror
                                        </div>

                                    <div id="advancePaymentFields" class="{{ $hasAdvancePayment === 'si' ? '' : 'hidden' }} space-y-4">
                                        <div class="mb-4">
                                            <label for="actualpago" class="block text-sm font-medium text-gray-700">Fecha de cada
                                                pago</label>
                                            <input id="actualpago" type="date" wire:model="actualpago"
                                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('actualpago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />

                                                @error('actualpago') <span class="text-red-500 text-sm"> {{$message}}</span>
                                                @enderror
                                            </div>

                                        <div>
                                            <label for="monedaactual" class="block text-sm font-medium text-gray-700">Moneda</label>
                                            <input id="monedaactual" type="text" wire:model="monedaactual"
                                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('monedaactual') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                                @error('monedaactual') <span class="text-red-500 text-sm"> {{$message}}</span>
                                                @enderror
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
                                        <label id="aplicapoliza" class="block text-sm font-medium text-gray-700">¿Aplica algún tipo de
                                            póliza?</label>
                                        <input id="aplicapoliza" type="text" wire:model="aplicapoliza"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicapoliza') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('aplicapoliza') <span class="text-red-500 text-sm"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    <div>
                                        <label for="porcentaje" class="block text-sm font-medium text-gray-700">¿Cuál es el
                                            porcentaje?</label>
                                        <input id="porcentaje" type="number" step="0.01" wire:model="porcentaje"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('porcentaje') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('porcentaje') <span class="text-red-500 text-sm"> {{$message}}</span>
                                            @enderror
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
                            <button wire:click="submit" type="button"
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
