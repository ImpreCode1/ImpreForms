<div>
    <x-app-layout>
        <div class="font-sans antialiased bg-gray-50 min-h-screen">
            <br>
            <br>
            {{-- <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Sistema de Importación de Datos</h1> --}}
            <div class="max-w-6xl mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
                    Carga de archivos colaboradores</h1>
                <!-- Secciones de carga dual -->
                <div class="max-w-7xl mx-auto px-4 py-8">
                    @if (session()->has('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {{-- Sección de Colaboradores --}}
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 py-4 px-6">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Carga de Colaboradores
                                </h2>
                            </div>
                            <div class="p-6">
                                <!-- Mostrar mensaje de éxito -->


                                <form wire:submit.prevent="importColaboradores" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-blue-50 transition duration-300">
                                            @if(isset($archivoColaboradores) && $archivoColaboradores)
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm text-gray-500 mt-2">
                                                        {{ $archivoColaboradores->getClientOriginalName() }}
                                                        <button
                                                            wire:click.prevent="$set('archivoColaboradores', null)"
                                                            class="ml-2 text-red-500 hover:text-red-700 transition"
                                                        >
                                                            Eliminar
                                                        </button>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Haz clic para cargar</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500">XLSX, XLS, CSV (MAX. 10MB)</p>
                                                </div>
                                            @endif
                                            <input
                                                type="file"
                                                wire:model="archivoColaboradores"
                                                accept=".xlsx,.xls,.csv"
                                                class="hidden"
                                            />
                                        </label>
                                    </div>

                                    @error('archivoColaboradores')
                                        <div class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button
                                        type="submit"
                                        @if(!isset($archivoColaboradores) || !$archivoColaboradores) disabled @endif
                                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center
                                               disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Cargar Archivo
                                    </button>
                                </form>

                                <!-- Indicador de carga -->
                                <div wire:loading wire:target="importColaboradores" class="mt-4 bg-blue-50 p-3 rounded-lg flex items-center">
                                    <svg class="animate-spin h-5 w-5 text-blue-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Procesando archivo...
                                </div>
                            </div>
                        </div>

                        {{-- Sección de Ejecutivos --}}
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                            <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 py-4 px-6">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Carga de Ejecutivos
                                </h2>
                            </div>
                            <div class="p-6">
                                <form wire:submit.prevent="import" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-indigo-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-indigo-50 transition duration-300">
                                            @if($file)
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm text-gray-500 mt-2">
                                                        {{ $file->getClientOriginalName() }}
                                                        <button
                                                            wire:click.prevent="$set('file', null)"
                                                            class="ml-2 text-red-500 hover:text-red-700 transition"
                                                        >
                                                            Eliminar
                                                        </button>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Haz clic para cargar</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500">XLSX, XLS, CSV (MAX. 10MB)</p>
                                                </div>
                                            @endif
                                            <input
                                                type="file"
                                                wire:model="file"
                                                accept=".xlsx,.xls,.csv"
                                                class="hidden"
                                            />
                                        </label>
                                    </div>

                                    @error('file')
                                        <div class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button
                                        type="submit"
                                        @if(!$file) disabled @endif
                                        class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition duration-300 flex items-center justify-center
                                               disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Cargar Archivo
                                    </button>
                                </form>

                                <!-- Indicador de carga -->
                                <div wire:loading wire:target="import" class="mt-4 bg-indigo-50 p-3 rounded-lg flex items-center">
                                    <svg class="animate-spin h-5 w-5 text-indigo-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Procesando archivo...
                                </div>
                            </div>
                        </div>

                        {{-- Sección de Directores --}}
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 py-4 px-6">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Carga de Directores
                                </h2>
                            </div>
                            <div class="p-6">
                                <form wire:submit.prevent="importDirectores" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-green-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-green-50 transition duration-300">
                                            @if($archivoDirectores)
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm text-gray-500 mt-2">
                                                        {{ $archivoDirectores->getClientOriginalName() }}
                                                        <button
                                                            wire:click.prevent="$set('archivoDirectores', null)"
                                                            class="ml-2 text-red-500 hover:text-red-700 transition"
                                                        >
                                                            Eliminar
                                                        </button>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Haz clic para cargar</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500">XLSX, XLS, CSV (MAX. 10MB)</p>
                                                </div>
                                            @endif
                                            <input
                                                type="file"
                                                wire:model="archivoDirectores"
                                                accept=".xlsx,.xls,.csv"
                                                class="hidden"
                                            />
                                        </label>
                                    </div>

                                    @error('archivoDirectores')
                                        <div class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button
                                        type="submit"
                                        @if(!$archivoDirectores) disabled @endif
                                        class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 flex items-center justify-center
                                               disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Cargar Archivo
                                    </button>
                                </form>

                                <!-- Indicador de carga -->
                                <div wire:loading wire:target="importDirectores" class="mt-4 bg-green-50 p-3 rounded-lg flex items-center">
                                    <svg class="animate-spin h-5 w-5 text-green-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Procesando archivo...
                                </div>
                            </div>
                        </div>

                        {{-- secciones de lineas --}}
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                            <div class="bg-gradient-to-r from-amber-500 to-amber-600 py-4 px-6">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Carga de Líneas
                                </h2>
                            </div>
                            <div class="p-6">
                                <form wire:submit.prevent="importlineas" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-amber-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-amber-50 transition duration-300">
                                            @if($archivoLineas)
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm text-gray-500 mt-2">
                                                        {{ $archivoLineas->getClientOriginalName() }}
                                                        <button
                                                            wire:click.prevent="$set('archivoLineas', null)"
                                                            class="ml-2 text-red-500 hover:text-red-700 transition"
                                                        >
                                                            Eliminar
                                                        </button>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Haz clic para cargar</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500">XLSX, XLS, CSV (MAX. 10MB)</p>
                                                </div>
                                            @endif
                                            <input
                                                type="file"
                                                wire:model="archivoLineas"
                                                accept=".xlsx,.xls,.csv"
                                                class="hidden"
                                            />
                                        </label>
                                    </div>

                                    @error('archivoLineas')
                                        <div class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button
                                        type="submit"
                                        @if(!$archivoLineas) disabled @endif
                                        class="w-full bg-amber-600 text-white py-3 rounded-lg hover:bg-amber-700 transition duration-300 flex items-center justify-center
                                               disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Cargar Archivo
                                    </button>
                                </form>

                                <!-- Indicador de carga -->
                                <div wire:loading wire:target="importlineas" class="mt-4 bg-amber-50 p-3 rounded-lg flex items-center">
                                    <svg class="animate-spin h-5 w-5 text-amber-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Procesando archivo...
                                </div>
                            </div>
                        </div>

                        {{-- seccion de codigo cliente --}}
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 py-4 px-6">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Carga de Código Cliente
                                </h2>
                            </div>
                            <div class="p-6">
                                <form wire:submit.prevent="importCodigoCliente" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-purple-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-purple-50 transition duration-300">
                                            @if($file)
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm text-gray-500 mt-2">
                                                        {{ $file->getClientOriginalName() }}
                                                        <button
                                                            wire:click.prevent="$set('file', null)"
                                                            class="ml-2 text-red-500 hover:text-red-700 transition"
                                                        >
                                                            Eliminar
                                                        </button>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-purple-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Haz clic para cargar</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500">XLSX, XLS, CSV (MAX. 10MB)</p>
                                                </div>
                                            @endif
                                            <input type="file" wire:model="file" accept=".xlsx,.xls,.csv" class="hidden" />
                                        </label>
                                    </div>

                                    @error('file')
                                        <div class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button
                                        type="submit"
                                        @if(!$file) disabled @endif
                                        class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition duration-300 flex items-center justify-center
                                            disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Cargar Archivo
                                    </button>
                                </form>

                                <!-- Indicador de carga -->
                                <div wire:loading wire:target="importCodigoCliente" class="mt-4 bg-purple-50 p-3 rounded-lg flex items-center">
                                    <svg class="animate-spin h-5 w-5 text-purple-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Procesando archivo...
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sección de acciones globales -->
                <div class="mt-8 bg-white rounded-xl shadow-xl p-6 border border-gray-100">
                    <div class="grid grid-cols-1  gap-6 mb-8">

                        <div
                            class="bg-amber-50 rounded-xl p-5 border border-amber-100 hover:shadow-md transition-shadow">
                            <div class="flex items-start">
                                <div class="bg-amber-100 rounded-lg p-3 mr-4">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg mb-2 text-gray-800">Instrucciones</h3>
                                    <ul class="text-sm space-y-2 text-gray-600">
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 text-amber-500 mr-2 mt-0.5 flex-shrink-0"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Verifica que todos los campos requeridos estén completos
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 text-amber-500 mr-2 mt-0.5 flex-shrink-0"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            El tamaño máximo del archivo es 10MB
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 text-amber-500 mr-2 mt-0.5 flex-shrink-0"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Solo se procesará la primera hoja del archivo Excel
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>

<script>
    const FILE_TYPES = ['.xlsx', '.xls', '.csv'];
    const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB

    document.addEventListener('DOMContentLoaded', () => {

        const uploadContainers = document.querySelectorAll('.rounded-xl.shadow-xl.overflow-hidden');

        uploadContainers.forEach(container => {
            const type = container.querySelector('h2').textContent.includes('colaboradores') ?
                'colaboradores' : 'ejecutivos';
            const colorClass = type === 'colaboradores' ? 'blue' : 'indigo';

            const elements = {
                dragZone: container.querySelector(`.border-${colorClass}-300`),
                fileInput: container.querySelector(`input[type="file"]`),
                filePreview: container.querySelector('.bg-gray-50.rounded-lg.p-3.border'),
                deleteButton: container.querySelector('.text-red-500'),
                processButton: container.querySelector(`.bg-${colorClass}-600`),
                downloadLink: container.querySelector('a[href="#"]'),
                previewCounter: container.querySelector(
                    '.flex.items-center.justify-between .text-xs.text-gray-500')
            };


            initUploader(elements, type, colorClass);
        });
    });

    function initUploader(elements, type, colorClass) {
        const {
            dragZone,
            fileInput,
            filePreview,
            deleteButton,
            processButton,
            downloadLink,
            previewCounter
        } = elements;

        // Inicialmente ocultar la vista previa
        filePreview.style.display = 'none';

        // Configurar drag & drop
        setupDragAndDrop(dragZone, fileInput, filePreview, colorClass);

        // Cambio en input de archivo
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                handleFile(fileInput.files[0], filePreview, previewCounter);
            }
        });

        // Botón de eliminación
        deleteButton.addEventListener('click', () => {
            fileInput.value = '';
            filePreview.style.display = 'none';
            if (previewCounter) previewCounter.textContent = '0 de 0 registros';
        });

        // Botón de procesamiento
        processButton.addEventListener('click', () => {
            if (fileInput.files.length) {
                processFile(fileInput.files[0], type);
            } else {
                showToast('Por favor, selecciona un archivo primero.', 'warning');
            }
        });

        // Enlace de descarga de plantilla
        if (downloadLink) {
            downloadLink.addEventListener('click', (e) => {
                e.preventDefault();
                downloadTemplate(type);
            });
        }
    }

    function setupDragAndDrop(dragZone, fileInput, filePreview, colorClass) {
        if (!dragZone) return;

        dragZone.addEventListener('click', () => fileInput.click());


        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
            dragZone.addEventListener(event, e => {
                e.preventDefault();
                e.stopPropagation();
            });
        });

        dragZone.addEventListener('dragenter', () => {
            dragZone.classList.add(`border-${colorClass}-400`, `bg-${colorClass}-100`);
        });

        dragZone.addEventListener('dragover', () => {
            dragZone.classList.add(`border-${colorClass}-400`, `bg-${colorClass}-100`);
        });

        ['dragleave', 'drop'].forEach(event => {
            dragZone.addEventListener(event, () => {
                dragZone.classList.remove(`border-${colorClass}-400`, `bg-${colorClass}-100`);
            });
        });


        dragZone.addEventListener('drop', e => {
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0], filePreview,
                    dragZone.closest('.rounded-xl').querySelector(
                        '.flex.items-center.justify-between .text-xs.text-gray-500'));
            }
        });
    }


    function handleFile(file, filePreview, previewCounter) {

        if (!validateFile(file)) return;


        updateFilePreview(file, filePreview);


        setTimeout(() => {
            const records = Math.floor(Math.random() * 50) + 10;

            // Actualizar información con el recuento de registros
            const fileInfo = filePreview.querySelector('.text-xs.text-gray-500 span');
            if (fileInfo) {
                const fileType = file.name.endsWith('.csv') ? 'CSV' : 'Excel';
                const fileSize = formatFileSize(file.size);
                fileInfo.textContent = `${fileType} • ${fileSize} • ${records} registros`;
            }

            // Actualizar contador en la vista previa
            if (previewCounter) {
                const visibleRecords = Math.min(5, records);
                previewCounter.textContent = `${visibleRecords} de ${records} registros`;
            }
        }, 800);
    }


    function validateFile(file) {

        const extension = '.' + file.name.split('.').pop().toLowerCase();
        if (!FILE_TYPES.includes(extension)) {
            showToast('Formato de archivo no válido. Por favor, usa XLSX, XLS o CSV.', 'error');
            return false;
        }


        if (file.size > MAX_FILE_SIZE) {
            showToast('El archivo es demasiado grande. El tamaño máximo es 10MB.', 'error');
            return false;
        }

        return true;
    }


    function updateFilePreview(file, filePreview) {

        filePreview.style.display = 'block';


        const fileName = filePreview.querySelector('h4');
        if (fileName) fileName.textContent = file.name;

        const fileInfo = filePreview.querySelector('.text-xs.text-gray-500 span');
        if (fileInfo) {
            const fileType = file.name.endsWith('.csv') ? 'CSV' : 'Excel';
            const fileSize = formatFileSize(file.size);
            fileInfo.textContent = `${fileType} • ${fileSize} • Analizando...`;
        }
    }


    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + 'B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(0) + 'KB';
        return (bytes / 1048576).toFixed(1) + 'MB';
    }


    function processFile(file, type) {

        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
        modal.innerHTML = `
    <div class="bg-white rounded-lg p-6 w-80 text-center">
      <svg class="animate-spin h-8 w-8 mx-auto text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <h3 class="text-lg font-medium mb-2">Procesando ${type}</h3>
      <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
      </div>
      <p class="text-sm text-gray-500">Procesando archivo: ${file.name}</p>
    </div>
  `;
        document.body.appendChild(modal);


        let progress = 0;
        const progressBar = modal.querySelector('.bg-blue-600');

        const interval = setInterval(() => {
            progress += 5;
            progressBar.style.width = `${progress}%`;

            if (progress >= 100) {
                clearInterval(interval);

                setTimeout(() => {
                    modal.querySelector('.bg-white').innerHTML = `
          <div class="rounded-full bg-green-100 p-3 w-12 h-12 mx-auto mb-4 flex items-center justify-center">
            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">¡Procesamiento completado!</h3>
          <p class="text-sm text-gray-500 mb-4">El archivo de ${type} ha sido procesado correctamente.</p>
          <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
            Aceptar
          </button>
        `;

                    modal.querySelector('button').addEventListener('click', () => {
                        document.body.removeChild(modal);
                    });
                }, 500);
            }
        }, 80);
    }


    function downloadTemplate(type) {

        const link = document.createElement('a');
        link.href = `#plantilla-${type}.xlsx`;
        link.download = `plantilla_${type}.xlsx`;


        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);


        showToast(`Descarga iniciada: plantilla_${type}.xlsx`, 'success');
    }

    // Mostrar notificación toast
    function showToast(message, type = 'success') {
        // Eliminar toasts existentes
        const existingToasts = document.querySelectorAll('.toast-notification');
        existingToasts.forEach(toast => document.body.removeChild(toast));

        // Configurar color según tipo
        let bgColor, iconPath;
        switch (type) {
            case 'success':
                bgColor = 'bg-green-600';
                iconPath =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
                break;
            case 'error':
                bgColor = 'bg-red-600';
                iconPath =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                break;
            case 'warning':
                bgColor = 'bg-yellow-500';
                iconPath =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>';
                break;
        }

        // Crear toast
        const toast = document.createElement('div');
        toast.className =
            `fixed bottom-4 right-4 ${bgColor} text-white rounded-lg shadow-lg px-4 py-3 z-50 flex items-center toast-notification`;
        toast.innerHTML = `
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      ${iconPath}
    </svg>
    <span>${message}</span>
  `;
        document.body.appendChild(toast);

        // Efecto de entrada
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(20px)';
        toast.style.transition = 'opacity 0.3s, transform 0.3s';

        setTimeout(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateY(0)';
        }, 10);

        // Quitar después de 3 segundos
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';

            setTimeout(() => {
                if (document.body.contains(toast)) {
                    document.body.removeChild(toast);
                }
            }, 300);
        }, 3000);
    }
</script>
