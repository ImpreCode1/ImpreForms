<div class="flex flex-col lg:flex-row h-scree">
    <!-- Contenedor de Imagen -->
    <div class="relative hidden w-0 flex-1 lg:block">
        <img class="absolute inset-0 h-full w-full object-cover"
            src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1908&amp;q=80"
            alt="">
        <div class="absolute inset-0 bg-black opacity-25"></div>

    </div>

    <!-- Contenedor de Formulario -->
    <div class="lg:w-1/2 bg-white flex items-center justify-center p-4 sm:p-8">


        <div class="w-full max-w-xl bg-white shadow-2xl rounded-3xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-center">
                <h1 class="text-2xl font-bold text-center tracking-wide text-white">
                    <i class="ri-file-list-3-line mr-3"></i>
                    Información Suministrada Por Financieras
                </h1>
            </div>

            <form id="multiStepForm" class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 space-y-6">
                <!-- Progreso del Formulario -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-2">
                        <div id="step1Indicator"
                            class="{{ $this->getStepIconClasses(1) }} w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-lg">
                            <i class="ri-building-line text-xl"></i>
                        </div>
                        <span class="font-semibold text-blue-600">Información de Negocio</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div id="step2Indicator"
                            class="{{ $this->getStepIconClasses(2) }} w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center">
                            <i class="ri-bank-card-line text-xl"></i>
                        </div>
                        <span class="text-gray-400">Información Financiera</span>
                    </div>
                </div>

                <!-- Paso 1: Formulario de Negocio -->
                <div id="step1" class="{{ $currentStep == 1 ? '' : 'hidden' }} form-step">
                    {{-- <h2 class="text-2xl font-bold mb-4 text-gray-500 flex items-center">
                        <i class="ri-building-line mr-3 text-blue-500"></i>Datos de Negocio
                    </h2> --}}

                    <div class="space-y-3">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Código del cliente
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Código de cliente" disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Nombre del cliente
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-user-line absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Nombre completo" disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                N° oportunidad CRM
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-task-line absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Número de oportunidad" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button wire:click="changeStep(2)" type="button"
                        class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg">
                        Siguiente Paso
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                    </div>
                </div>

                <!-- Paso 2: Formulario Financiero -->
                <div id="step2" class="{{ $currentStep == 2 ? '' : 'hidden' }} form-step">
                    <!-- <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center">
                        <i class="ri-bank-card-line mr-3 text-blue-500"></i>Condiciones Financieros
                    </h2> -->

                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Plazo
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-time-line absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" placeholder="Duración del plazo">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Forma De Pago
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-bank-card-line text-blue-200 absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" placeholder="Forma De Pago">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Moneda
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-money-dollar-circle-line text-blue-200 absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" placeholder="Moneda">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                ¿Hay existencia de anticipo?
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="hasAdvancePayment" value="si"
                                        wire:model="hasAdvancePayment" wire:click="setAdvancePayment('si')">
                                    <span class="ml-2">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="hasAdvancePayment" value="no"
                                        wire:model="hasAdvancePayment" wire:click="setAdvancePayment('no')">
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <div id="advancePaymentFields" class="{{ $hasAdvancePayment === 'si' ? '' : 'hidden' }} space-y-4">
                            <!-- //porcentaje -->
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    Porcentaje de anticipo
                                </label>
                                <div class="relative">
                                    <i
                                        class="ri-percent-line absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                    <input
                                        class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                        type="number" min="0" max="100" placeholder="Porcentaje">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    Fecha de pago del anticipo
                                </label>
                                <div class="relative">
                                    <i
                                        class="ri-calendar-line absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                    <input
                                        class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                        type="date">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="flex justify-between mt-6">
                        <button wire:click="changeStep(1)" type="button"
                            class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg">
                            <i class="ri-arrow-left-line mr-2"></i> Anterior
                        </button>

                        <button type="submit"
                            class="flex items-center bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-3 px-7 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                            Enviar <i class="ri-send-plane-line ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
