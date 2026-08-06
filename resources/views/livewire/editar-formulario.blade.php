<div>
    <div class="font-sans text-gray-900 antialiased">
        <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-8">
            <div class="form-step">
                <div class="bg-gray-50 p-6 rounded-lg mt-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-yellow-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v12a2 2 0 01-2 2z" />
                        </svg>
                        Tipo de Solicitud
                    </h2>

                    <div class="relative">
                        <label for="tipo_solicitud" class="block text-sm font-medium text-gray-700">Solicitud</label>


                        <i
                            class="ri-file-text-line absolute left-3 top-1/2 transform -translate-y-1/2
                                {{ $errors->has('tipo_solicitud') ? 'text-red-500' : 'text-gray-400' }}"></i>
                        <select id="tipo_solicitud" wire:model.live="tipo_solicitud"
                            class="mt-1 block w-full rounded-md border-gray-300
                                {{ $errors->has('tipo_solicitud') ? 'border-red-300' : 'border-blue-100' }}
                                rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                            <option value="" disabled>Seleccione tipo de solicitud</option>
                            <option value="Contrato">Contrato</option>
                            {{-- <option value="Contrato">Contrato</option> --}}
                            {{-- <option value="Otrosi">Otrosí</option>
                            <option value="Alcance">Alcance</option> --}}
                        </select>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <!-- Información del Negocio -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Información de Negocio
                        </h2>

                        {{-- @dd($correo); --}}
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="codigo_cliente" class="block text-sm font-medium text-gray-700">Código
                                    Cliente</label>
                                <input type="text" wire:model.live="negocio"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  {{ $errors->has('negocio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('negocio')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" wire:model.live="nombres"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm {{ $errors->has('nombres') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('nombres')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="nom_rep" class="block text-sm font-medium text-gray-700">Nombre del
                                    representante legal</label>
                                <input id="nom_rep" type="text" wire:model.live="nom_rep"
                                    class="mt-1 block w-full rounded-md border-gray-300  shadow-sm {{ $errors->has('nom_rep') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('nom_rep')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
                                <input type="email" wire:model.live="correo"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm {{ $errors->has('correo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('correo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                                <input type="text" wire:model.live="numero"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm {{ $errors->has('numero') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('numero')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="crm" class="block text-sm font-medium text-gray-700">N° oportunidad
                                    CRM</label>
                                <input type="text" wire:model.live="crms"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('crms') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('crms')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="incluye_iva" class="block text-sm font-medium text-gray-700">Incluye
                                    IVA</label>
                                <select id="incluye_iva" wire:model.live="incluye_iva"
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
                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio de
                                    venta que debe
                                    quedar
                                    en el contrato</label>
                                <input id="precio" type="text" wire:model.live="precio"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('precio') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('precio')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="moneda_precio_venta"
                                    class="block text-sm font-medium text-gray-700">Moneda</label>
                                <select id="moneda_precio_venta" wire:model.live="moneda_precio_venta"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('moneda_precio_venta') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    <option value="">Seleccione moneda</option>
                                    <option value="COP">COP</option>
                                    <option value="USD">USD</option>
                                </select>
                                @error('moneda_precio_venta')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>


                    <!-- Orden Compra Cliente -->
                    {{-- <div class="bg-gray-50 p-6 rounded-lg"> --}}
                    {{-- <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                            Orden Compra Cliente
                        </h2> --}}

                    <div class="grid grid-cols-1 gap-4">
                        {{-- <div>
                                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                <input id="fecha" type="date" wire:model.live="fecha"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('fecha')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="oc" class="block text-sm font-medium text-gray-700">N°
                                    OC</label>
                                <input id="oc" type="text" wire:model.live="oc"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('oc') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('oc')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div> --}}



                        {{-- <div class="mx-auto max-w-2xl rounded-lg bg-white p-6 shadow-md">
                                <h2 class="mb-4 text-xl font-bold">Cotización</h2>
                                <label for="cotizacion" class="block text-sm font-medium text-gray-700">Adjuntar
                                    Cotización</label>
                                <input id="cotizacion" type="file" wire:model.live="cotizacion"
                                    class="mt-2 w-full cursor-pointer rounded bg-gray-100 text-sm font-medium text-gray-500 file:mr-4 file:cursor-pointer file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-white file:hover:bg-blue-500" />

                                @error('cotizacion')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                                @if ($cotizacion)
                                    <div class="mt-4 flex items-center justify-between rounded bg-gray-100 p-3">

                                        <a href="{{ asset('storage/' . $cotizacion) }}"
                                            target="_blank" class="text-blue-500 underline">
                                            Cotización
                                        </a>
                                        <button type="button" wire:click="eliminarArchivo"
                                            class="text-red-500 hover:text-red-700">Eliminar</button>
                                    </div>
                                @endif



                            </div> --}}
                    </div>
                    {{-- </div> --}}

                </div>

                <!--Tipo de Contrato -->
                <div class="bg-gray-50 p-6 rounded-lg mt-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Tipo de Solicitud
                    </h2>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="soluciones" class="block text-sm font-medium text-gray-700">Soluciones</label>
                            <select id="soluciones" wire:model.live="soluciones"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('soluciones') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
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

                <!-- Gerente de producto -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Gerente de producto
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="linea" class="block text-sm font-medium text-gray-700">Línea</label>
                            <input id="linea" type="text" value="{{ $linea }}"
                                readonly
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50
                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                        </div>

                        <div>
                            <label for="linea_especifica" class="block text-sm font-medium text-gray-700">Línea específica</label>
                            <select id="linea_especifica" wire:model.live="linea_especifica"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('linea_especifica') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <option value="">Seleccionar</option>
                                <option value="EBG">EBG</option>
                                <option value="Solar">Solar</option>
                                <option value="Daas">Daas</option>
                                <option value="HPE">HPE</option>
                            </select>
                            @error('linea_especifica')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="codlinea" class="block text-sm font-medium text-gray-700">Código de la
                                línea</label>
                            <input id="codlinea" type="text" wire:model.live="codlinea"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('codlinea') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('codlinea')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div>
                            <label for="nombre_linea" class="block text-sm font-medium text-gray-700">
                                Nombre de la línea
                            </label>
                            <input id="nombre_linea" type="text" value="{{ $nombreLinea }}"
                                readonly
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50
                                shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                        </div> --}}

                        <div>
                            <label for="nomgerente" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input id="nomgerente" type="text" wire:model.live="nomgerente"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nomgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('nomgerente')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div>
                            <label for="telgerente" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input id="telgerente" type="text" wire:model.live="telgerente"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('telgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('telgerente')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div>
                            <label for="corgerente" class="block text-sm font-medium text-gray-700">Correo
                                electrónico</label>
                            <input id="corgerente" type="text" wire:model.live="corgerente"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('corgerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('corgerente')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>



                        <h5 class="text-xl font-semibold mb-4 col-span-2  text-stone-950 tracking-wide">
                            Información Director
                        </h5>
                        <div>
                            <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                            <input id="director" type="text" wire:model.live="director"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('director') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('director')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div>
                            <label for="tel2gerente" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input id="tel2gerente" type="text" wire:model.live="tel2gerente"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tel2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('tel2gerente')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div>
                            <label for="cor2gerente" class="block text-sm font-medium text-gray-700">Correo
                                electrónico</label>
                            <input id="cor2gerente" type="text" wire:model.live="cor2gerente"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cor2gerente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('cor2gerente')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>


                        <h5 class="text-xl font-semibold mb-4 col-span-2 text-stone-950 tracking-wide">
                            Información Ejecutivo
                        </h5>
                        {{-- informacion ejecutivo --}}

                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700">Cod</label>
                            <input type="text" wire:model.live="cod_ejc"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cod_ejc') ? 'border-red-400' : 'border-blue-100' }}  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('cod_ejc')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" wire:model.live="nombre_ejc"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('nombre_ejc') ? 'border-red-400' : 'border-blue-100' }}  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('nombre_ejc')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" wire:model.live="telefono_ejc"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('telefono_ejc') ? 'border-red-400' : 'border-blue-100' }}  shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('telefono_ejc')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div>
                            <label class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="text" wire:model.live="email_ejc"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('email_ejc') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('email_ejc')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>


                        <h5 class="text-xl font-semibold mb-4 col-span-2 text-stone-950 tracking-wide">
                            Información Adicional (si se requiere)
                        </h5>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Otro</label>
                            <input type="text" wire:model.live="clientcode"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                placeholder="Opcional" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" wire:model.live="clientname"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                placeholder="Opcional" />
                            @error('clientname')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                            <input type="text" wire:model.live="mail"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                placeholder="Opcional" />
                            @error('mail')
                                <span class="text-red-500 text-sm mt-1 block"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Orden de compra</label>
                            <input type="text" wire:model.live="orden_compra"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                placeholder="Opcional" />
                            @error('orden_compra')
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
                                <label for="realiza_entrega_cliente"
                                    class="block text-sm font-medium text-gray-700">¿Quién realiza la entrega a
                                    cliente?</label>
                                <input id="entregacliente" type="text" wire:model.live="entregacliente"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('entregacliente') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('entregacliente')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="cantidad_entregas" class="block text-sm font-medium text-gray-700">Cantidad
                                    de entregas</label>
                                <input id="cantidad_entregas" type="number" min="1" wire:model.live="cantidad_entregas"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('cantidad_entregas') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('cantidad_entregas')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="fecha_entrega" class="block text-sm font-medium text-gray-700">Fecha de
                                    entrega</label>
                                <input id="fecha_entrega" type="date" wire:model.live="fecha_entrega"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_entrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('fecha_entrega')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="lugarentrega" class="block text-sm font-medium text-gray-700">Lugar de
                                    entrega y dirección</label>
                                <input id="lugarentrega" type="text" wire:model.live="lugarentrega"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('lugarentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('lugarentrega')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="espais" class="block text-sm font-medium text-gray-700">Especificar
                                    país</label>
                                <input id="espais" type="text" wire:model.live="espais"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('espais') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('espais')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
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
                            </div>

                            <div>
                                <label for="terminoentrega" class="block text-sm font-medium text-gray-700">Fecha de
                                    inicio del término de entrega (día, mes, año)</label>
                                <input id="terminoentrega" type="date" wire:model.live="terminoentrega"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminoentrega') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('terminoentrega')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="tipoicoterm" class="block text-sm font-medium text-gray-700">¿Qué tipo de
                                    incoterms aplica?</label>
                                <select id="tipoicoterm" wire:model.live="tipoicoterm"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('tipoicoterm') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    <option value="" disabled>Seleccione tipo de incoterms</option>
                                    <option value="CIF">CIF</option>
                                    <option value="DDP">DDP</option>
                                    <option value="FCA">FCA</option>
                                    <option value="FOB">FOB</option>
                                    <option value="EXW">EXW</option>
                                </select>
                                @error('tipoicoterm')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Información del Servicio -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.25 12a3.25 3.25 0 11-4.5 0 3.25 3.25 0 014.5 0zm4.56 7.44a7.5 7.5 0 00-13.62 0M18 8a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>

                            Información del Servicio
                        </h2>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="servicio_a_prestar" class="block text-sm font-medium text-gray-700">¿Qué
                                    servicio se va a
                                    prestar?</label>
                                <input id="prestar" type="text" wire:model.live="prestar"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('prestar') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('prestar')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="frecuencia_suministro"
                                    class="block text-sm font-medium text-gray-700">¿Cada
                                    cuanto se va a
                                    suministrar?</label>
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
                                <label for="finalizacion" class="block text-sm font-medium text-gray-700">Fecha de
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
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        Información del Pago
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="forma_pago" class="block text-sm font-medium text-gray-700">Forma de
                                pago:</label>
                            <input id="forma_pago" type="text" wire:model.live="forma_pago"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('forma_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('forma_pago')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="fecha_cada_pago" class="block text-sm font-medium text-gray-700">Plazos</label>
                            <input id="fecha_cada_pago" type="text" wire:model.live="fecha_cada_pago"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_cada_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('fecha_cada_pago')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="moneda" class="block text-sm font-medium text-gray-700">Moneda de
                                pago:</label>
                            <select id="moneda" wire:model.live="moneda"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('moneda') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <option value="" disabled>Seleccione moneda</option>
                                <option value="COP">COP</option>
                                <option value="USD">USD</option>
                            </select>
                            @error('moneda')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="incluye_iva" class="block text-sm font-medium text-gray-700">¿Incluir
                                IVA?</label>
                            <select id="incluye_iva" wire:model.live="incluye_iva"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('incluye_iva') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <option value="" disabled>Seleccione una opción</option>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('incluye_iva')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="hay_anticipo" class="block text-sm font-medium text-gray-700">¿Hay algún
                                anticipo?</label>
                            <select id="hay_anticipo" wire:model.live="hay_anticipo"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('hay_anticipo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <option value="" disabled>Seleccione una opción</option>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('hay_anticipo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="porcentaje_anticipo"
                                class="block text-sm font-medium text-gray-700">Porcentaje de anticipo:</label>
                            <input id="porcentaje_anticipo" type="number" step="1"
                                wire:model.live="porcentaje_anticipo"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('porcentaje_anticipo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('porcentaje_anticipo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="fecha_pago_anticipo" class="block text-sm font-medium text-gray-700">Fecha de
                                pago del anticipo:</label>
                            <input id="fecha_pago_anticipo" type="date" wire:model.live="fecha_pago_anticipo"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('fecha_pago_anticipo') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('fecha_pago_anticipo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="otros_pago" class="block text-sm font-medium text-gray-700">Otros:</label>
                            <input id="otros_pago" type="text" wire:model.live="otros_pago"
                                class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('otros_pago') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                            @error('otros_pago')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-step">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                <label for="garantia" class="block text-sm font-medium text-gray-700">¿Aplica
                                    algún
                                    tipo de
                                    garantía?</label>
                                <select wire:model.live="aplicagarantia" id="garantia"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicagarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                                @error('aplicagarantia')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="terminogarantia" class="block text-sm font-medium text-gray-700">¿Cuál
                                    es
                                    el término de
                                    la
                                    garantía?</label>
                                <input id="terminogarantia" type="text" wire:model.live="terminogarantia"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('terminogarantia') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('terminogarantia')
                                    <span class="text-red-500 text-sm"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Productos Section -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2v6h6" />
                            </svg>
                            Pólizas
                        </h2>
                        <div class="grid gap-4">
                            <div>
                                <label for="aplicapoliza" class="block text-sm font-medium text-gray-700">¿Aplica
                                    algún tipo de
                                    póliza?</label>
                                <select wire:model.live="aplicapoliza" id="aplicapoliza"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('aplicapoliza') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                                @error('aplicapoliza')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="porcentaje"
                                    class="block text-sm font-medium text-gray-700">Porcentaje</label>
                                <input id="porcentaje" type="number" step="0.01" wire:model.live="porcentaje"
                                    class="mt-1 block w-full rounded-md border-gray-300 {{ $errors->has('porcentaje') ? 'border-red-400' : 'border-blue-100' }} shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" />
                                @error('porcentaje')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>





                <!-- Existing Files Section -->
                @if (count($existingFiles) > 0)
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-700">Archivos existentes:</h3>
                        <div class="space-y-2 max-w-2xl mx-auto">
                            @foreach ($existingFiles as $file)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <a href="{{ Storage::url($file['path']) }}" target="_blank" class="text-sm text-blue-600 hover:underline">
                                            {{ $file['name'] }}
                                        </a>
                                    </div>
                                    <button type="button"
                                        wire:click="marcarArchivosParaEliminar({{ $file['id'] }})"
                                        wire:confirm="¿Estás seguro de eliminar este archivo?"
                                        class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif





                @if (session()->has('message'))
                    <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

            </div>

            <div class="w-full">
                <h2 class="text-lg font-bold text-gray-900 mt-6 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                    </svg> Adjuntar Documentación
                </h2>

                <div class="border-dashed border-2 border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors duration-300"
                    wire:drop.prevent="handleDrop($event.dataTransfer.files)"
                    wire:dragover.prevent="dragOver" wire:dragleave.prevent="dragLeave">

                    <input type="file" wire:model="archivosNuevos" multiple class="hidden"
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

                            <div class="flex items-center mt-4 bg-blue-50 rounded-lg p-2 text-sm text-gray-600">
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

                    <div wire:loading wire:target="archivosNuevos"
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

                    @error('archivosNuevos')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    @error('archivosNuevos.*')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message ??
                                'El formato del archivo que intentas subir no está permitido. Usa: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG, MSG, ZIP, EML' }}
                        </p>
                    @enderror
                </div>

                @if (count($tempFiles) > 0)
                    <div class="mt-4">
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Archivos Seleccionados:</h3>
                        <ul class="space-y-2">
                            @foreach ($tempFiles as $id => $file)
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
                                            <span class="text-sm font-medium text-gray-700">{{ $file['name'] }}</span>
                                            <span class="text-xs text-gray-500">{{ $file['size'] }} KB</span>
                                        </div>
                                    </div>
                                    <button type="button"
                                        wire:click="quitarArchivo('{{ $id }}')"
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
            </div>

            <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">
                {{-- <button type="button" @click="showModal = false"
                    class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 hover:border-gray-400 transition-colors duration-200">
                    Cancelar
                </button> --}}
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition-colors duration-200">

                    {{-- Spinner siempre reserva espacio, pero solo se muestra cuando está cargando --}}
                    <span class="w-5 h-5 inline-block">
                        <svg wire:loading wire:target="submit" class="animate-spin w-5 h-5" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                            </path>
                        </svg>
                    </span>

                    Guardar Cambios
                </button>

            </div>
        </form>

    </div>
</div>
