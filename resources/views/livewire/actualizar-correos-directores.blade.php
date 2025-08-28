<div>
    <x-app-layout>
        <br><br>

        <div class="max-w-md mx-auto">
            <div class="text-center mb-2">
                <div class="inline-flex p-3 rounded-full bg-indigo-100 mb-4">
                    <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Correos de Directores</h2>
                <p class="mt-2 text-sm text-gray-600">Actualiza los correos de los responsables de Operaciones y Financiera</p>
            </div>

            <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-white/20 hover:shadow-indigo-100 transition-all duration-300">
                <form wire:submit.prevent="guardarCorreos">
                    <div class="group">
                        <div class="mt-4">
                            <div class="flex items-center text-sm font-medium text-gray-700 mb-1">
                                <x-input-label for="correo_administrador" :value="__('Correo del Administrador')" />
                            </div>
                        </div>
                        <x-text-input wire:model="correo_administrador" id="correo_administrador"
                                    type="email" placeholder="administrador@impresistem.com"
                                    class="block w-full mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                        <x-input-error :messages="$errors->get('correo_administrador')" class="mt-2 text-red-500 text-sm" />
                    </div>
                    {{-- Correo Operaciones --}}
                    <div class="group">
                        <div class="mt-4">
                            <div class="flex items-center text-sm font-medium text-gray-700 mb-1">
                                <x-input-label for="correo_operaciones" :value="__('Correo de Operaciones')" />
                            </div>
                        </div>
                        <x-text-input wire:model="correo_operaciones" id="correo_operaciones"
                                    type="email" placeholder="operaciones@impresistem.com"
                                    class="block w-full mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                        <x-input-error :messages="$errors->get('correo_operaciones')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    {{-- Correo Financiera --}}
                    <div class="group">
                        <div class="mt-4">
                            <div class="flex items-center text-sm font-medium text-gray-700 mb-1">
                                <x-input-label for="correo_financiera" :value="__('Correo de Financiera')" />
                            </div>
                        </div>
                        <x-text-input wire:model="correo_financiera" id="correo_financiera"
                                    type="email" placeholder="financiera@impresistem.com"
                                    class="block w-full mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                        <x-input-error :messages="$errors->get('correo_financiera')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    {{-- Botón guardar --}}
                    <div class="mt-6 text-center">
                        <button type="submit"
                                class="w-full inline-flex justify-center items-center gap-2 px-4 py-2 bg-indigo-600 text-white font-semibold text-sm rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Guardar Cambios
                        </button>
                    </div>
                </form>

                @if (session()->has('message'))
                    <div class="mt-4 text-sm text-green-600 text-center">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
</div>
