<div>
        <div class="font-sans text-gray-900 antialiased">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit.prevent="submit" id="operacionesForm" class="space-y-8">
                    <div id="step1" class="{{ $currentStep === 1 ? '' : 'hidden' }} form-step">
                        <!-- Header Section -->
                        <div class="bg-gray-50 p-6 rounded-lg mb-6">
                            <h1 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
                                Información Comercial
                            </h1>

                            <!-- Tipo de Solicitud Section -->
                            <div class="grid grid-cols-1 gap-4">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-yellow-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v12a2 2 0 01-2 2z" />
                                    </svg> Tipo de Solicitud
                                </h2>
                                <div class="relative">
                                    <i
                                        class="ri-file-text-line absolute left-3 top-1/2 transform -translate-y-1/2
                                        {{ $errors->has('tipo_solicitud') ? 'text-red-500' : 'text-gray-400' }}"></i>
                                    <select id="tipo_solicitud" wire:model.live="tipo_solicitud"
                                        class="mt-1 block w-full rounded-md border-gray-300
                                        {{ $errors->has('tipo_solicitud') ? 'border-red-300' : 'border-blue-100' }}
                                        rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                                        <option value="" disabled>Seleccione tipo de solicitud</option>
                                        <option value="Contrato">Contrato</option>
                                    </select>
                                </div>
                                @error('tipo_solicitud')
                                    <span class="text-sm text-red-500 text-center block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Main Info Section - Two Column Layout -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Column 1: Información del Negocio -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg> Información del Equipo Comercial
                                </h2>
                                <div class="grid grid-cols-1 gap-4">
                                    <!-- Client Information Fields -->
                                    <div>
                                        <label for="negocio" class="block text-sm font-medium text-gray-700">
                                            Código Cliente
                                        </label>
                                        <input type="text" id="negocio" wire:model.live="negocio"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('negocio') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('negocio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700">
                                            Nombre del cliente
                                        </label>
                                        <input id="nombre" type="text"
                                            value="{{ $nombre }}"
                                            wire:key="nombre-{{ $nombre }}"
                                            readonly
                                            class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50
                                            {{ $errors->has('nombre') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('nombre')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nom_rep" class="block text-sm font-medium text-gray-700">
                                            Nombre del representante legal
                                        </label>
                                        <input id="nom_rep" type="text" wire:model.live="nom_rep"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('nom_rep') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('nom_rep')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nit" class="block text-sm font-medium text-gray-700">
                                            NIT
                                        </label>
                                        <input id="nit" type="text" wire:model.live="nit"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('nit') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('nit')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="direccion_domicilio" class="block text-sm font-medium text-gray-700">
                                            Dirección según Cámara de Comercio
                                        </label>
                                        <input id="direccion_domicilio" type="text" wire:model.live="direccion_domicilio"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('direccion_domicilio') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('direccion_domicilio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="cc_representante" class="block text-sm font-medium text-gray-700">
                                            Cédula del representante legal
                                        </label>
                                        <input id="cc_representante" type="text" wire:model.live="cc_representante"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('cc_representante') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('cc_representante')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="correo" class="block text-sm font-medium text-gray-700">
                                            Correo electronico del representante legal
                                        </label>
                                        <input id="correo" type="email" wire:model.live="correo"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('correo') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('correo')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="numero" class="block text-sm font-medium text-gray-700">
                                            Numero celular cliente
                                        </label>
                                        <input id="numero" type="text" wire:model.live="numero"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('numero') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('numero')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="crm" class="block text-sm font-medium text-gray-700">
                                            N° oportunidad CRM:
                                        </label>
                                        <input id="crm" type="text" wire:model.live="crm"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('crm') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('crm')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="incluye_iva" class="block text-sm font-medium text-gray-700">
                                            ¿Incluye IVA?
                                        </label>
                                        <select id="incluye_iva" wire:model="incluye_iva"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('incluye_iva') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="" disabled>Seleccione</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('incluye_iva')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="precio" class="block text-sm font-medium text-gray-700">
                                            Precio de venta que debe quedar en el contrato
                                        </label>
                                        <input id="precio" type="text" wire:model.live="precio" inputmode="decimal"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('precio') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('precio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="moneda_precio_venta"
                                            class="block text-sm font-medium text-gray-700">
                                            Seleccione moneda:
                                        </label>
                                        <select id="moneda_precio_venta" wire:model="moneda_precio_venta"
                                            class="mt-1 block w-full rounded-md border-gray-300
                                            {{ $errors->has('moneda_precio_venta') ? 'border-red-400' : 'border-blue-100' }}
                                            shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="" disabled>Seleccione</option>
                                            <option value="USD">USD</option>
                                            <option value="COP">COP</option>
                                        </select>
                                        @error('moneda_precio_venta')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Column 2: Tipo de Solicitud & Equipo Comercial -->
                            <div class="space-y-6">
                                <!-- Tipo de Solicitud Section -->
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <h2
                                        class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg> Tipo de Solicitud
                                    </h2>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label for="soluciones" class="block text-sm font-medium text-gray-700">
                                                Soluciones
                                            </label>
                                            <select id="soluciones" wire:model.live="soluciones"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('soluciones') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="" disabled>Seleccionar Solución</option>
                                                <option value="Negocios que involucren productos y servicios">Negocios que involucren productos y servicios</option>
                                                <option value="Líneas Huawei EBG, Datacenter y Solar, líneas de paneles solares (Longi y Trina)">Líneas Huawei EBG, Datacenter y Solar, líneas de paneles solares (Longi y Trina)</option>
                                                <option value="Oportunidades Cerradas con condiciones particulares diferentes al negocio tradicional transaccional">Oportunidades Cerradas con condiciones particulares diferentes al negocio tradicional transaccional</option>
                                                <option value="Productos Sobre pedido">Productos Sobre pedido</option>
                                                <option value="Oportunidades cerradas de cualquier valor con incumplimiento o condiciones financieras especiales">Oportunidades cerradas de cualquier valor con incumplimiento o condiciones financieras especiales</option>
                                                <option value="Por demanda">Por demanda</option>
                                            </select>
                                            @error('soluciones')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Equipo Comercial Section -->
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <h3 class="text-xl font-bold mb-4 text-center text-stone-950 tracking-wide">
                                        Información del Equipo Comercial
                                    </h3>

                                    <!-- Gerente de producto Section -->
                                    <h2
                                        class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg> Gerente de producto
                                    </h2>

                                    <div class="grid md:grid-cols-2 gap-4">

                                        <div class="md:col-span-2">
                                            <label for="linea_especifica" class="block text-sm font-medium text-gray-700">
                                                Línea específica
                                            </label>
                                            <select id="linea_especifica" wire:model.live="linea_especifica"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('linea_especifica') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="">Seleccionar</option>
                                                <option value="EBG">EBG</option>
                                                <option value="Solar">Solar</option>
                                                <option value="Daas">Daas</option>
                                                <option value="HPE">HPE</option>
                                            </select>
                                            @error('linea_especifica')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="codlinea" class="block text-sm font-medium text-gray-700">
                                                Código de la línea
                                            </label>
                                            <input type="text" id="codlinea" wire:model.live="codlinea"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('codlinea') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('codlinea')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="nombre_linea" class="block text-sm font-medium text-gray-700">
                                                Nombre de la línea
                                            </label>
                                            <input id="nombre_linea" type="text" wire:model.live="nombreLinea"
                                                readonly
                                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        </div>

                                        <div>
                                            <label for="nomgerente" class="block text-sm font-medium text-gray-700">
                                                Nombre
                                            </label>
                                            <input id="nomgerente" type="text" wire:model.live="nomgerente"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('nomgerente') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('nomgerente')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="corgerente" class="block text-sm font-medium text-gray-700">
                                                Correo electrónico
                                            </label>
                                            <input id="corgerente" type="text" wire:model.live="corgerente"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('corgerente') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            @error('corgerente')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Información Director Section -->
                                    <h5 class="text-lg font-semibold mt-6 mb-3 text-stone-950 tracking-wide">
                                        Información Director
                                    </h5>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="nombre_dir" class="block text-sm font-medium text-gray-700">
                                                Nombre
                                            </label>
                                            <select id="nombre_dir" wire:model.live="selectedDirector"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('selectedDirector') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="">Seleccione un Director</option>
                                                @foreach ($directores as $director)
                                                    <option value="{{ $director->id }}">
                                                        {{ $director->nombre_director_formatted }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('selectedDirector')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="DirectorEmail"
                                                class="block text-sm font-medium text-gray-700">
                                                Correo Electrónico
                                            </label>
                                            <input id="DirectorEmail" type="text" wire:model.live="DirectorEmail"
                                                value="{{ $DirectorEmail }}"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('DirectorEmail') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                readonly />
                                        </div>
                                    </div>


                                    <!-- Información Ejecutivo Section -->
                                    <h5 class="text-lg font-semibold mt-6 mb-3 text-stone-950 tracking-wide">
                                        Información Ejecutivo
                                    </h5>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="nombre_ejc" class="block text-sm font-medium text-gray-700">
                                                Nombre
                                            </label>
                                            <select id="nombre_ejc" wire:model.live="selectedEjecutivo"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('selectedEjecutivo') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="">Seleccione un Ejecutivo</option>
                                                @foreach ($ejecutivos as $ejecutivo)
                                                    <option value="{{ $ejecutivo->id }}">
                                                        {{ $ejecutivo->nombre_colaborador_formatted }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedEjecutivo')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="EjecutivoEmail"
                                                class="block text-sm font-medium text-gray-700">
                                                Correo Electronico
                                            </label>
                                            <input id="EjecutivoEmail" type="text"
                                                wire:model.live="EjecutivoEmail" value="{{ $EjecutivoEmail }}"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('EjecutivoEmail') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                readonly />
                                        </div>
                                    </div>

                                    <!-- Información Adicional Section -->
                                    <h5 class="text-lg font-semibold mt-6 mb-3 text-stone-950 tracking-wide">
                                        Información Adicional (si se requiere)
                                    </h5>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Otro</label>
                                            <input type="text" wire:model.live="clientcode"
                                                class="mt-1 block w-full rounded-md border-gray-300
                                                {{ $errors->has('clientcode') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                placeholder="Opcional" />
                                            @error('clientcode')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                            <input type="text" wire:model.live="clientname"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                placeholder="Opcional" />
                                            @error('clientname')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Correo
                                                electrónico</label>
                                            <input type="text" wire:model.live="mail"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                placeholder="Opcional" />
                                            @error('mail')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Orden de compra</label>
                                            <input type="text" wire:model.live="orden_compra"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                placeholder="Opcional" />
                                            @error('orden_compra')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="flex justify-center mt-6">
                            <button wire:click="changeStep(2)"
                                x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })" type="button"
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
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-yellow-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8.25l1.88 3.81 4.19.61-3.03 2.95.72 4.18L12 17.19l-3.76 1.97.72-4.18-3.03-2.95 4.19-.61L12 8.25z" />
                                    </svg> Información de Entrega
                                </h2>
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="entregacliente"
                                            class="block text-sm font-medium text-gray-700">¿Quién realiza la entrega a
                                            cliente?</label>
                                        <input id="entregacliente" type="text" wire:model.live="entregacliente"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('entregacliente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('entregacliente')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="cantidad_entregas"
                                            class="block text-sm font-medium text-gray-700">Cantidad de entregas</label>
                                        <input id="cantidad_entregas" type="number" min="1"
                                            wire:model.live="cantidad_entregas"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cantidad_entregas') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('cantidad_entregas')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="fecha_entrega"
                                            class="block text-sm font-medium text-gray-700">Fecha de entrega</label>
                                        <input id="fecha_entrega" type="date"
                                            wire:model.live="fecha_entrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_entrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('fecha_entrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="lugarentrega"
                                            class="block text-sm font-medium text-gray-700">Lugar de entrega y
                                            dirección</label>
                                        <input id="lugarentrega" type="text" wire:model.live="lugarentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('lugarentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('lugarentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="espais"
                                            class="block text-sm font-medium text-gray-700">Especificar país</label>
                                        <input id="espais" type="text" wire:model.live="espais"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('espais') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('espais')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="tiempo_entrega_cantidad"
                                            class="block text-sm font-medium text-gray-700">
                                            Tiempo de entrega
                                        </label>
                                        <div class="flex gap-2 mt-1">
                                            <input id="tiempo_entrega_cantidad" type="number"
                                                wire:model.live="tiempo_entrega_cantidad" min="1"
                                                class="flex-1 rounded-md border-gray-300
                                                {{ $errors->has('tiempo_entrega_cantidad') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            <select wire:model.live="tiempo_entrega_unidad"
                                                class="w-32 rounded-md border-gray-300
                                                {{ $errors->has('tiempo_entrega_unidad') ? 'border-red-400' : 'border-blue-100' }}
                                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                <option value="Días">Días</option>
                                                <option value="Semanas">Semanas</option>
                                                <option value="Meses">Meses</option>
                                                <option value="Años">Años</option>
                                            </select>
                                        </div>
                                        @error('tiempo_entrega_cantidad')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                        @error('tiempo_entrega_unidad')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="terminoentrega"
                                            class="block text-sm font-medium text-gray-700">A partir de qué fecha se cuenta el término de entrega (día, mes, año)</label>
                                        <input id="terminoentrega" type="date" wire:model.live="terminoentrega"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('terminoentrega')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="tipoicoterm" class="block text-sm font-medium text-gray-700">¿Qué
                                            tipo de incoterms aplica?</label>
                                        <select id="tipoicoterm" wire:model.live="tipoicoterm"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tipoicoterm') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="" disabled>Seleccione tipo de incoterms</option>
                                            <option value="CIF">CIF</option>
                                            <option value="DDP">DDP</option>
                                            <option value="FCA">FCA</option>
                                            <option value="FOB">FOB</option>
                                            <option value="EXW">EXW</option>
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
                                    </svg> Información del Servicio (Opcional)
                                </h2>
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="prestar" class="block text-sm font-medium text-gray-700">¿Qué
                                            servicio se va a prestar?</label>
                                        <input id="prestar" type="text" wire:model.live="prestar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('prestar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('prestar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="suministrar" class="block text-sm font-medium text-gray-700">¿Cada
                                            cuanto se va a suministrar?</label>
                                        <input id="suministrar" type="text" wire:model.live="suministrar"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('suministrar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('suministrar')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="inicio" class="block text-sm font-medium text-gray-700">Fecha de
                                            inicio</label>
                                        <input id="inicio" type="date" wire:model.live="inicio"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('inicio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('inicio')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="finalizacion"
                                            class="block text-sm font-medium text-gray-700">Fecha de
                                            finalización</label>
                                        <input id="finalizacion" type="date" wire:model.live="finalizacion"
                                            class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('finalizacion') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                        @error('finalizacion')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <!-- Información de Pago -->
                        <div class="bg-gray-50 p-6 rounded-lg mt-6">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a5 5 0 00-10 0v2a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2z" />
                                </svg>
                                Información de Pago (Opcional)
                            </h2>
                            <div class="grid grid-cols-1 gap-4">

                                <!-- Forma de pago -->
                                <div>
                                    <label for="forma_pago" class="block text-sm font-medium text-gray-700">Forma de
                                        pago</label>
                                    <input id="forma_pago" type="text" wire:model.live="forma_pago"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('forma_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('forma_pago')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Plazos -->
                                <div>
                                    <label for="fecha_cada_pago"
                                        class="block text-sm font-medium text-gray-700">Plazos</label>
                                    <input id="fecha_cada_pago" type="text" wire:model.live="fecha_cada_pago"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_cada_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('fecha_cada_pago')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="moneda" class="block text-sm font-medium text-gray-700">
                                        Seleccione moneda:
                                    </label>
                                    <select id="moneda" wire:model="moneda"
                                        class="mt-1 block w-full rounded-md border-gray-300
                                        {{ $errors->has('moneda') ? 'border-red-400' : 'border-blue-100' }}
                                        shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="" selected>Seleccione</option>
                                        <option value="USD">USD</option>
                                        <option value="COP">COP</option>
                                    </select>
                                    @error('moneda')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Incluye IVA -->
                                <div class="flex flex-col">
                                    <label for="incluir_iva" class="block text-sm font-medium text-gray-700">
                                        Incluye IVA
                                    </label>

                                    <select id="incluir_iva" wire:model="incluir_iva"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-200 sm:text-sm">
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>

                                    @error('incluir_iva')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>



                                <!-- Checkbox Hay Anticipo -->
                                <div class="flex items-center">
                                    <input id="hay_anticipo" type="checkbox" wire:model="hay_anticipo"
                                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-200" />
                                    <label for="hay_anticipo" class="ml-2 block text-sm text-gray-700">
                                        Hay anticipo
                                    </label>
                                    @error('hay_anticipo')
                                        <span class="text-red-500 text-sm ml-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Porcentaje de anticipo (SIEMPRE visible) -->
                                <div class="mt-3">
                                    <label for="porcentaje_anticipo" class="block text-sm font-medium text-gray-700">
                                        Porcentaje de anticipo (%)
                                    </label>
                                    <input id="porcentaje_anticipo" type="number" step="1" min="0"
                                        max="100" wire:model.lazy="porcentaje_anticipo"
                                        class="mt-1 block w-full rounded-md border-gray-300
                                        {{ $errors->has('porcentaje_anticipo') ? 'border-red-400' : 'border-blue-100' }}
                                        shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('porcentaje_anticipo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Fecha de pago anticipo -->
                                <div>
                                    <label for="fecha_pago_anticipo"
                                        class="block text-sm font-medium text-gray-700">Fecha de pago anticipo</label>
                                    <input id="fecha_pago_anticipo" type="date"
                                        wire:model.live="fecha_pago_anticipo"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_pago_anticipo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('fecha_pago_anticipo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Otros -->
                                <div>
                                    <label for="otros_pago"
                                        class="block text-sm font-medium text-gray-700">Otros</label>
                                    <input id="otros_pago" type="text" wire:model.live="otros_pago"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('otros_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('otros_pago')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                        </div>

                        <!-- Información Financiera Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 7h-8l4-7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9v10c0 1.105 1.025 2 2.267 2.233L12 22l3.733-2.767C16.975 21 18 20.105 18 19V9l-6 4-6-4z" />
                                </svg> Información Financiera
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="facturacion_moneda" class="block text-sm font-medium text-gray-700">
                                        Moneda de facturación
                                    </label>
                                    <select id="facturacion_moneda" wire:model.live="facturacion_moneda"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('facturacion_moneda') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccione...</option>
                                        <option value="COP">COP</option>
                                        <option value="USD">USD</option>
                                    </select>
                                    @error('facturacion_moneda')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="trm" class="block text-sm font-medium text-gray-700">
                                        TRM
                                    </label>
                                    <select id="trm" wire:model.live="trm"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('trm') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccione...</option>
                                        <option value="Pactada">Pactada</option>
                                        <option value="TRM del día de factura">TRM del día de factura</option>
                                    </select>
                                    @error('trm')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cuenta_compensacion" class="block text-sm font-medium text-gray-700">
                                        Cuenta de compensación
                                    </label>
                                    <select id="cuenta_compensacion" wire:model.live="cuenta_compensacion"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cuenta_compensacion') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="">Seleccione...</option>
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                    @error('cuenta_compensacion')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="saldo_restante_porcentaje" class="block text-sm font-medium text-gray-700">
                                        Saldo restante (%)
                                    </label>
                                    <input id="saldo_restante_porcentaje" type="number" step="0.01" min="0" max="100"
                                        wire:model.live="saldo_restante_porcentaje"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('saldo_restante_porcentaje') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('saldo_restante_porcentaje')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="saldo_restante_valor" class="block text-sm font-medium text-gray-700">
                                        Saldo restante valor
                                    </label>
                                    <input id="saldo_restante_valor" type="number" step="0.01" min="0"
                                        wire:model.live="saldo_restante_valor"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('saldo_restante_valor') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('saldo_restante_valor')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="saldo_restante_fecha_pago" class="block text-sm font-medium text-gray-700">
                                        Fecha de pago saldo restante
                                    </label>
                                    <input id="saldo_restante_fecha_pago" type="date"
                                        wire:model.live="saldo_restante_fecha_pago"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('saldo_restante_fecha_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('saldo_restante_fecha_pago')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="md:col-span-2">
                                    <label for="otras_observaciones" class="block text-sm font-medium text-gray-700">
                                        Otras observaciones
                                    </label>
                                    <textarea id="otras_observaciones" wire:model.live="otras_observaciones" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('otras_observaciones') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"></textarea>
                                    @error('otras_observaciones')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Objeto del Contrato Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-emerald-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Objeto del Contrato
                            </h2>

                            <div class="mb-4 p-4 bg-white rounded-lg border border-dashed border-gray-300">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Cargar desde Excel
                                </label>
                                <input type="file" wire:model="excelFile" accept=".xlsx,.xls,.csv"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                                <div wire:loading wire:target="excelFile" class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                                    <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                    </svg>
                                    Procesando archivo...
                                </div>
                                @error('excelFile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            @if ($showExcelMapping)
                                <div class="mb-4 p-4 bg-amber-50 rounded-lg border border-amber-200">
                                    <h3 class="text-sm font-semibold text-amber-800 mb-3">Mapear columnas del Excel</h3>

                                    @if ($excelAutoMatched)
                                        <div class="text-sm text-emerald-700 mb-4 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Columnas detectadas automáticamente.
                                        </div>
                                    @else
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                            @foreach ($excelHeaders as $index => $header)
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ $header }}</label>
                                                    <select wire:model.live="columnMapping.{{ $index }}"
                                                        class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200">
                                                        <option value="">-- Ignorar --</option>
                                                        <option value="Descripción">Descripción</option>
                                                        <option value="Cantidad">Cantidad</option>
                                                        <option value="Tipo">Tipo</option>
                                                        <option value="Precio Unitario">Precio Unitario</option>
                                                    </select>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (!empty($excelPreview))
                                        <div class="overflow-x-auto mb-3">
                                            <table class="w-full text-sm border-collapse">
                                                <thead>
                                                    <tr class="border-b border-amber-300">
                                                        <th class="px-2 py-1 text-left">#</th>
                                                        <th class="px-2 py-1 text-left">Descripción</th>
                                                        <th class="px-2 py-1 text-left">Cantidad</th>
                                                        <th class="px-2 py-1 text-left">Tipo</th>
                                                        <th class="px-2 py-1 text-left">P. Unitario</th>
                                                        <th class="px-2 py-1 text-left">Tipo Garantía</th>
                                                        <th class="px-2 py-1 text-left">Cant. Garantía</th>
                                                        <th class="px-2 py-1 text-left">Tiempo Garantía</th>
                                                        <th class="px-2 py-1 text-left">P. Total</th>
                                                        <th class="px-2 py-1 text-left">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($excelPreview as $i => $previewRow)
                                                        <tr class="border-b border-amber-100 {{ $previewRow['error'] ? 'bg-red-50' : '' }}">
                                                            <td class="px-2 py-1 text-gray-500">{{ $i + 1 }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['descripcion'] }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['cantidad'] }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['tipo'] }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['precio_unitario'] }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['garantia_tipo'] ?? '' }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['garantia_cantidad'] ?? '' }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['garantia_unidad'] ?? '' }}</td>
                                                            <td class="px-2 py-1">{{ $previewRow['precio_total'] ?? '' }}</td>
                                                            <td class="px-2 py-1">
                                                                @if ($previewRow['error'])
                                                                    <span class="text-red-600 text-xs font-medium">{{ $previewRow['error'] }}</span>
                                                                @else
                                                                    <span class="text-green-600 text-xs">✓ Válida</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="border-t-2 border-amber-300">
                                                        <td colspan="8" class="px-2 py-1 text-right text-sm font-bold text-gray-700">
                                                            Total General:
                                                        </td>
                                                        <td class="px-2 py-1 text-sm font-bold text-gray-900">
                                                            {{ number_format(collect($excelPreview)->where('error', null)->sum('precio_total'), 2) }}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        @php
                                            $hasErrorsInPreview = collect($excelPreview)->contains(fn($r) => $r['error'] !== null);
                                        @endphp

                                        @if ($hasErrorsInPreview)
                                            <div class="text-sm text-amber-700 mb-2">
                                                ⚠ Hay filas con errores. Al confirmar, solo se aplicarán las filas válidas.
                                            </div>
                                        @endif
                                    @endif

                                    <div class="flex gap-2">
                                        @if (!empty($excelPreview) && $hasErrorsInPreview)
                                            <button type="button" wire:click="applyExcelWithErrors"
                                                onclick="return confirm('Se aplicarán solo las filas válidas. ¿Continuar?')"
                                                class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700">
                                                Aplicar solo las filas válidas
                                            </button>
                                        @else
                                            <button type="button" wire:click="confirmarMapeoExcel"
                                                onclick="return confirm('¿Reemplazar el Objeto del Contrato actual con los datos del Excel? Esta acción no se puede deshacer.')"
                                                class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700">
                                                Confirmar y reemplazar
                                            </button>
                                        @endif
                                        <button type="button" wire:click="cancelarMapeoExcel"
                                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="border-b border-gray-300">
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Descripción</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Cantidad</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipo</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Precio Unitario</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipo Garantía</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Cant. Garantía</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tiempo Garantía</th>
                                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Precio Total</th>
                                            <th class="px-3 py-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($objetoContrato as $index => $item)
                                            <tr wire:key="item-{{ $index }}" class="border-b border-gray-200 hover:bg-white transition-colors" x-data>
                                                <td class="px-3 py-2">
                                                    <input type="text" wire:model.live="objetoContrato.{{ $index }}.descripcion"
                                                        placeholder="Descripción del producto o servicio"
                                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('objetoContrato.' . $index . '.descripcion') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                                    @error('objetoContrato.' . $index . '.descripcion')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td class="px-3 py-2">
                                                    <input data-cantidad type="number" min="1"
                                                        wire:model.live="objetoContrato.{{ $index }}.cantidad"
                                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('objetoContrato.' . $index . '.cantidad') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                                    @error('objetoContrato.' . $index . '.cantidad')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td class="px-3 py-2">
                                                    <select wire:model.live="objetoContrato.{{ $index }}.tipo"
                                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('objetoContrato.' . $index . '.tipo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                                        <option value="">Seleccione...</option>
                                                        <option value="Hardware">Hardware</option>
                                                        <option value="Licencia">Licencia</option>
                                                        <option value="HiCare">HiCare</option>
                                                        <option value="Servicio">Servicio</option>
                                                    </select>
                                                    @error('objetoContrato.' . $index . '.tipo')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td class="px-3 py-2">
                                                    <input data-precio-u type="number" step="0.01" min="0"
                                                        wire:model.live="objetoContrato.{{ $index }}.precio_unitario"
                                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('objetoContrato.' . $index . '.precio_unitario') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                                    @error('objetoContrato.' . $index . '.precio_unitario')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td class="px-3 py-2">
                                                    <span class="block text-sm text-gray-700">{{ $item['garantia_tipo'] ?? '—' }}</span>
                                                </td>
                                                <td class="px-3 py-2">
                                                    <span class="block text-sm text-gray-700">{{ $item['garantia_cantidad'] ?? '—' }}</span>
                                                </td>
                                                <td class="px-3 py-2">
                                                    <span class="block text-sm text-gray-700">{{ $item['garantia_unidad'] ?? '—' }}</span>
                                                </td>
                                                <td class="px-3 py-2">
                                                    <input type="number" step="0.01" readonly
                                                        x-bind:value="(parseFloat($el.closest('tr').querySelector('[data-cantidad]')?.value) || 0) * (parseFloat($el.closest('tr').querySelector('[data-precio-u]')?.value) || 0)"
                                                        wire:model="objetoContrato.{{ $index }}.precio_total"
                                                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-gray-500 shadow-sm cursor-not-allowed" />
                                                </td>
                                                <td class="px-3 py-2 text-center">
                                                    <button type="button" wire:click="eliminarFila({{ $index }})"
                                                        class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-lg transition-colors duration-200"
                                                        title="Eliminar ítem">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-t-2 border-gray-300">
                                            <td colspan="7" class="px-3 py-3 text-right text-sm font-bold text-gray-700">
                                                Total General:
                                            </td>
                                            <td class="px-3 py-3 text-sm font-bold text-gray-900">
                                                <span x-data="{ total: 0 }" x-init="
                                                    total = () => {
                                                        let sum = 0;
                                                        document.querySelectorAll('[data-cantidad]').forEach(el => {
                                                            const tr = el.closest('tr');
                                                            const qty = parseFloat(el.value) || 0;
                                                            const price = parseFloat(tr.querySelector('[data-precio-u]')?.value) || 0;
                                                            sum += qty * price;
                                                        });
                                                        return sum.toFixed(2);
                                                    };
                                                    $watch('$wire.objetoContrato', () => { total = total(); });
                                                " x-text="total()">
                                                    {{ number_format(array_sum(array_column($objetoContrato, 'precio_total')), 2) }}
                                                </span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="mt-4">
                                <button type="button" wire:click="agregarFila"
                                    class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Agregar ítem
                                </button>
                            </div>
                        </div>

                        <!-- Pólizas Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 3H5c-1.104 0-2 .896-2 2v14c0 1.104.896 2 2 2h14c1.104 0 2-.896 2-2V5c0-1.104-.896-2-2-2z" />
                                </svg> Pólizas
                            </h2>
                            <div class="grid gap-4">
                                <div>
                                    <label for="aplicapoliza" class="block text-sm font-medium text-gray-700">¿Aplica
                                        algún tipo de póliza?</label>
                                    <select wire:model.live="aplicapoliza" id="aplicapoliza"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicapoliza') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <option value="" disabled>Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                    </select> @error('aplicapoliza')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    @if ($aplicapoliza === 'si')
                                        <label for="porcentaje" class="block text-sm font-medium text-gray-700">
                                            ¿Cuál es el porcentaje?
                                        </label>
                                        <div class="relative mt-1">
                                            <input id="porcentaje" type="number" step="1"
                                                wire:model="porcentaje"
                                                class="block w-full pr-10 rounded-md border-gray-300
                                                        {{ $errors->has('porcentaje') ? 'border-red-400' : 'border-blue-100' }}
                                                        shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                            <span
                                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 text-sm pointer-events-none">
                                                %
                                            </span>
                                        </div>
                                        @error('porcentaje')
                                            <span class="text-red-500 text-sm"> {{ $message }}</span>
                                        @enderror
                                    @endif
                                </div>

                                <div>
                                    <label for="aseguradora_poliza" class="block text-sm font-medium text-gray-700">
                                        Aseguradora de la póliza
                                    </label>
                                    <input id="aseguradora_poliza" type="text" wire:model.live="aseguradora_poliza"
                                        class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aseguradora_poliza') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                    @error('aseguradora_poliza')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <!-- Área de Archivos -->
                        {{-- inicio subida de documentos --}}
                        <div>
                            <label for="porcentaje" class="block text-sm font-medium text-gray-700">

                            </label>
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                </svg> Adjuntar Documentación
                            </h2>
                            <!-- Zona de arrastrar y soltar -->
                            <div class="border-dashed border-2 border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors duration-300"
                                wire:drop.prevent="handleDrop($event.dataTransfer.files)"
                                wire:dragover.prevent="dragOver" wire:dragleave.prevent="dragLeave">

                                <input type="file" wire:model="attachments" multiple class="hidden"
                                    id="file-upload"
                                    accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.msg,.zip,.eml" />

                                <label for="file-upload" class="cursor-pointer">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-blue-50 p-4 rounded-full mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <p class="text-gray-700 font-medium mb-2">
                                            <span class="text-blue-600 hover:underline font-semibold">Seleccione los
                                                archivos</span>
                                            para adjuntar la siguiente documentación:
                                        </p>

                                        <div class="bg-gray-50 rounded-lg p-4 w-full max-w-md">
                                            <ul class="text-sm text-gray-600 list-disc pl-5 text-left space-y-2">
                                                <li>Formato NEC</li>
                                                <li>Correo electrónico de aprobaciones financieras</li>
                                                <li>Cámara de comercio con expedición no mayor a 60 días</li>
                                                <li>Detalle tangible e intangible a entregar</li>
                                                <li>Cotización</li>
                                                <li>Correo electronico de aprobación del margen (si aplica)</li>
                                                <li>Correo electrónico de aprobación del factor (si aplica)</li>
                                                <li>Orden de compra</li>
                                            </ul>
                                        </div>

                                        <div
                                            class="flex items-center mt-4 bg-blue-50 rounded-lg p-2 text-sm text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p>
                                                Formatos permitidos:
                                                <strong>PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG, MSG,
                                                    ZIP, EML</strong>.
                                                Tamaño máximo: <strong>10MB</strong>.
                                            </p>
                                        </div>


                                        <p class="text-blue-600 mt-4 font-medium text-sm">Haga clic para seleccionar
                                            uno o varios documentos</p>
                                    </div>
                                </label>

                                <!-- Loader mientras se cargan archivos -->
                                <div wire:loading wire:target="attachments"
                                    class="flex justify-center items-center text-blue-600 bg-blue-50 border border-blue-200 rounded-lg px-6 py-3 mt-2 shadow-sm">
                                    <svg class="animate-spin h-6 w-6 text-blue-600 mr-2"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z">
                                        </path>
                                    </svg>
                                </div>

                                <ul>
                                    @foreach ($files as $file)
                                        <li>{{ $file['name'] }} ({{ $file['size'] }} KB)</li>
                                    @endforeach
                                </ul>


                                @error('attachments')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                                @error('attachments.*')
                                    <p class="text-red-500 text-sm mt-2">
                                        {{ $message ??
                                            'El formato del archivo que intentas subir no está permitido.
                                                                                                                                Usa: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG, MSG,
                                                                                                                                    ZIP, EML' }}

                                    </p>
                                @enderror
                            </div>

                            <!-- Mensajes de éxito -->
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!-- Lista de documentos -->
                            {{-- final subida de documentos  --}} @if (count($files) > 0)
                                <div class="mt-4">
                                    <h3 class="text-sm font-medium text-gray-700 mb-2">Archivos Seleccionados:</h3>
                                    <ul class="space-y-2">
                                        @foreach ($files as $id => $file)
                                            <li wire:key="file-{{ $id }}"
                                                class="bg-gray-50 rounded-lg p-3 flex items-center justify-between group hover:bg-gray-100 transition-all duration-200">
                                                <div class="flex items-center space-x-3">
                                                    <div class="p-2 bg-blue-100 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-blue-600" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <span
                                                            class="text-sm font-medium text-gray-700">{{ $file['name'] }}</span>
                                                        <span class="text-xs text-gray-500">{{ $file['size'] }}
                                                            KB</span>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                    wire:click="removeFile('{{ $id }}')"
                                                    class="hidden group-hover:flex items-center space-x-1 text-sm text-red-500 hover:text-red-700 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span>Eliminar</span>
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="flex flex-col mt-6"> @error('files.*')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror <br>
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
                                        {{-- <button wire:click.prevent="submit" --}}
                                        <button wire:click="submit" wire:loading.attr="disabled" wire:target="submit"
                                            type="button"
                                            class="group relative bg-blue-600 py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-3 overflow-hidden disabled:opacity-60">
                                            <!-- Fondo animado -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-600 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            </div>

                                            <!-- Ícono normal -->
                                            <svg wire:loading.remove wire:target="submit"
                                                xmlns="http://www.w3.org/2000/svg" class="relative h-5 w-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                            <!-- Spinner -->
                                            <svg wire:loading wire:target="submit"
                                                class="relative h-5 w-5 text-white animate-spin"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z"></path>
                                            </svg>

                                            <!-- Texto normal -->
                                            <span wire:loading.remove wire:target="submit"
                                                class="relative font-semibold text-white">
                                                Enviar Formulario
                                            </span>

                                            <!-- Texto cargando -->
                                            <span wire:loading wire:target="submit"
                                                class="relative font-semibold text-white">
                                                Enviando...
                                            </span>
                                        </button>

                                    </div>
                                </div>
                                <br>

                                @if ($errors->any())
                                    <div class="alert alert-danger mb-4 text-center">
                                        <span class="text-red-500 font-medium">Parece que algunos campos del formulario aún no
                                            están completos o contienen información incorrecta.</span>
                                        <ul class="mt-2 text-left text-sm text-red-600 list-disc pl-5 max-w-md mx-auto">
                                            @foreach ($errors->toArray() as $campo => $mensajes)
                                                @php
                                                    $campoBase = explode('.', $campo)[0];
                                                    $paso = $pasoPorCampo[$campoBase] ?? 2;
                                                    $etiqueta = $etiquetas[$campoBase] ?? $campoBase;
                                                @endphp
                                                @foreach ($mensajes as $mensaje)
                                                    <li><b>(Paso {{ $paso }})</b> {{ $etiqueta }}: {{ $mensaje }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div id="modalContainer">
                                    @if ($mmd)
                                        <div
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-sm">
                                            <div
                                                class="relative max-h-[90vh] w-full max-w-4xl overflow-y-auto rounded-lg border border-gray-100 bg-white p-6 shadow-xl sm:p-8">
                                                <div class="mb-6 text-center md:mb-10">
                                                    <h4 class="mb-4 text-2xl font-bold text-black md:text-3xl">
                                                        Formulario Enviado Correctamente</h4>
                                                    <p class="leading-relaxed text-gray-600">
                                                        Su formulario ha sido enviado con éxito. Ahora, es necesario
                                                        validar la información ingresada y asegurarse de que los
                                                        formularios de <span
                                                            class="font-semibold text-blue-600">Operaciones</span> y
                                                        <span class="font-semibold text-green-600">Financiera</span>
                                                        sean completados correctamente.
                                                    </p>
                                                </div>
                                                <div class="rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-sm text-blue-700">
                                                                Puede realizar un seguimiento del estado de su
                                                                formulario en la sección <span
                                                                    class="font-bold">Historial</span>.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-6 text-center text-sm text-gray-500 md:mt-8">
                                                    <p>Recuerde que los formularios de <span
                                                            class="font-semibold text-blue-600">Operaciones</span> y
                                                        <span class="font-semibold text-green-600">Financiera</span>
                                                        deben completarse para finalizar el proceso.
                                                    </p>
                                                </div>
                                                <div class="mt-4 flex justify-end">
                                                    <button wire:click="cerrarmodal"
                                                        class="rounded-lg bg-red-500 px-4 py-2 text-white transition-colors hover:bg-red-600"
                                                        type="button">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                </form>
            </div>
        </div>


<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('validation-error', (data) => {
            Swal.fire({
                icon: 'error',
                title: 'Errores en el formulario',
                html: data.message
            })
        })
    });
</script>


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


    document.addEventListener('livewire:init', function () {
        Livewire.on('reloadPage', () => {
            location.reload();
        });
        Livewire.on('copy-to-clipboard', ({ text }) => {
            copyToClipboard(text);
        });
    });
</script>
</div>
