<div class="flex flex-col lg:flex-row h-scree">
    <!-- Contenedor de Imagen -->
    <div class="relative hidden w-0 flex-1 lg:block">
        <img class="absolute inset-0 h-full w-full object-cover"
            src="https://images.unsplash.com/photo-1491975474562-1f4e30bc9468?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1908&amp;q=80"
            alt="">
        <div class="absolute inset-0 bg-black opacity-25"></div>

    </div>

    <!-- Contenedor de Formulario -->
    <div class="lg:w-1/2 bg-white flex items-center justify-center p-4 sm:p-8">
        <div class="w-full max-w-xl bg-white shadow-2xl rounded-3xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-6 px-8">
                <h1 class="text-2xl font-bold text-center tracking-wide">
                    Información Suministrada Por Operaciones
                </h1>
                <p class="text-center text-indigo-100 mt-2 text-sm">
                    Formulario de Condiciones del Negocio
                </p>
            </div>
            <form wire:submit.prevent="submit" id="multiStepForm"
                class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 space-y-6">
                <!-- Progreso del Formulario -->
                <div class="flex justify-between items-center mb-10 space-x-4">
                    <!-- Paso 1 -->
                    <div class="flex flex-col items-center" data-step="1">
                        <div
                            class="{{ $this->getStepIconClasses(1) }} w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm text-gray-500 mt-2">Información Negocio</span>
                    </div>

                    <!-- Barra de progreso entre Paso 1 y Paso 2 -->

                    <div class="flex-1 h-1 bg-gray-200 relative">
                        <div class="progress-connector absolute inset-0 bg-indigo-500 transition-all duration-400 ease-in-out"
                            style="width: {{ $this->getProgressWidth(1, 2) }};">
                        </div>
                    </div>

                    <!-- Paso 2 -->
                    <div class="flex flex-col items-center" data-step="2">
                        <div
                            class="{{ $this->getStepIconClasses(2) }} w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm text-gray-500 mt-2">Información Entrega</span>
                    </div>

                    <!-- Barra de progreso entre Paso 2 y Paso 3 -->
                    <div class="flex-1 h-1 bg-gray-200 relative">
                        <div class="progress-connector absolute inset-0 bg-indigo-500 transition-all duration-400 ease-in-out"
                            style="width: {{ $this->getProgressWidth(2, 3) }};">
                        </div>
                    </div>

                    <!-- Paso 3 -->
                    <div class="flex flex-col items-center" data-step="3">
                        <div
                            class="{{ $this->getStepIconClasses(3) }} w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <span class="text-sm text-gray-500 mt-2">Logística</span>
                    </div>
                </div>

                <!-- Paso 1: Formulario de Negocio -->
                <div id="step1" class="{{ $currentStep == 1 ? '' : 'hidden' }} form-step">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-3" for="clientCode">
                                Código del cliente
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </div>
                                <input
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 cursor-not-allowed"
                                id="clientCode" name="clientCode" type="text" placeholder="Código de cliente"
                                value="{{ $cliente }}" disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-3" for="clientName">
                                Nombre del cliente
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 cursor-not-allowed"
                                id="clientName" name="clientName" type="text" placeholder="Nombre completo"
                                value="{{ $nombre }}" disabled>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 text-sm font-semibold mb-3" for="crmOpportunityNumber">
                                N° oportunidad CRM
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7 13.4V7a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2h6" />
                                    </svg>
                                </div>
                                <input
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 cursor-not-allowed"
                                id="crmOpportunityNumber" name="crmOpportunityNumber" type="text"
                                placeholder="Número de oportunidad" value="{{ $crm }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-8">
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

                <!-- Paso 2: Formulario entrega -->
                <div id="step2" class="{{ $currentStep == 2 ? '' : 'hidden' }} form-step">
                    <div class="space-y-4">
                        <div>
                            <label for="clientes" class="block text-gray-700 text-sm font-semibold mb-3">
                                ¿Quien realiza la entrega a cliente?
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-user-location-line absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400z @error('clientes') text-red-500 @enderror"></i>
                                <input id="clientes" wire:model="clientes" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('clientes') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Entrega">
                            </div>
                            @error('clientes')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-3">
                                Lugar de entrega
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-map-pin-line absolute left-3 top-1/2 transform -translate-y-1/2 @error('lugar') text-red-500 @enderror"></i>
                                <input id="lugar" wire:model="lugar" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('lugar') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Lugar">
                            </div>
                            @error('lugar')
                                <span class="text-sm text-red-500 ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="pais" class="block text-gray-700 text-sm font-semibold mb-3">
                                Especificar pais
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-earth-line absolute left-3 top-1/2 transform -translate-y-1/2 @error('pais') text-red-500 @enderror"></i>
                                <input id="pais" wire:model="pais" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('pais') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Pais">
                            </div>
                            @error('pais')
                                <span class="text-sm text-red-500"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="puerto" class="block text-gray-700 text-sm font-semibold mb-3">
                                Puerto
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-anchor-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('puerto') text-red-500 @enderror"></i>

                                <input id="puerto" wire:model="puerto" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('puerto') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Puerto">
                            </div>
                            @error('puerto')
                                <span class="text-sm text-red-500"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="flex justify-between mt-6">
                        <button wire:click="changeStep(1)" type="button"
                            class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg">
                            <i class="ri-arrow-left-line mr-2"></i> Anterior
                        </button>
                        <button wire:click="changeStep(3)" type="button"
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

                <!-- Paso 3: Formulario logistica -->
                <div id="step3" class="{{ $currentStep == 3 ? '' : 'hidden' }} form-step">
                    <div class="space-y-4">
                        <div>
                            <label for="icoterm" class="block text-gray-700 text-sm font-semibold mb-3">
                                Incoterm
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-file-list-3-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('icoterm') text-red-500 @enderror"></i>

                                <input id="icoterm" wire:model="icoterm" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                   @error('icoterm') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Icoterm">
                            </div>
                            @error('icoterm')
                                <span class="text-sm text-red-500 "> {{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="transporte" class="block text-gray-700 text-sm font-semibold mb-3">
                                Transporte
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-truck-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('transporte') text-red-500 @enderror"></i>
                                <input id="transporte" wire:model="transporte" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('transporte') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Transporte">
                            </div>
                            @error('transporte')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="origen" class="block text-gray-700 text-sm font-semibold mb-3">
                                Origen
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-map-pin-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('origen') text-red-500 @enderror"></i>

                                <input id="origen" wire:model="origen" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('origen') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Origen">
                            </div>
                            @error('origen')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                        </div>

                        <div>
                            <label for="destino" class="block text-gray-700 text-sm font-semibold mb-3">
                                Destino
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-flag-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('destino') text-red-500 @enderror"></i>
                                <input id="destino" wire:model="destino" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('destino') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Destino">
                            </div>
                            @error('destino')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="entregalocal" class="block text-gray-700 text-sm font-semibold mb-3">
                                Condiciones de entrega local
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-map-pin-2-line absolute left-3 top-1/2 transform -translate-y-1/2  @error('entregalocal') text-red-500 @enderror"></i>

                                <input id="entregalocal" wire:model="entregalocal" autocomplete="off"
                                    class="pl-12 w-full input-gradient  rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('entregalocal') border-red-300 @else border-gray-300 @enderror"
                                    type="text" placeholder="Entrega Local">
                            </div>
                            @error('entregalocal')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="flex flex-col mt-6">
                        @if ($errors->any())
                        <div class="alert alert-danger mb-4 text-center">
                            <span class="text-red-500">Parece que algunos campos del formulario aún no están completos o contienen información incorrecta.</span>
                        </div>
                        @endif
                    <div class="flex justify-between mt-6">
                        <button wire:click="changeStep(2 )" type="button"
                            class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg">
                            <i class="ri-arrow-left-line mr-2"></i> Anterior
                        </button>
                        <button  type="button" onclick="confirmarEnvio()"
                            class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-300 shadow-md hover:shadow-lg">
                            Enviar <i class="ri-send-plane-line ml-2"></i>
                        </button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>



    @if(session('success'))
    <div class="w-3/5 fixed top-0  right-0 z-50 flex items-center p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg shadow-lg" role="alert">
        <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
  <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
  </svg>
  </div>
        <span class="font-medium">Éxito!</span> {{ session('success') }}
        <button  type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-md focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.293 7.293a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 011.414 1.414L11.414 12l2.293 2.293a1 1 0 01-1.414 1.414L10 13.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 12 6.293 9.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
        </button>

      </div>
  @endif





        <!-- Modal de Confirmación -->


        <div id="modalConfirm" class="fixed inset-0  bg-gray-500 bg-opacity-75 transition-opacity hidden">
            <div class="flex items-center justify-center h-full">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
    <div class="flex items-center">
        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-yellow-100 sm:h-10 sm:w-10 flex items-center justify-center mr-3">
            <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900">Enviar Formulario</h3>
    </div>
    <p class="mt-2 text-sm text-gray-600">¿Está seguro de que desea enviar el formulario?</p>
    <div class="mt-4 flex justify-end">
        <button onclick="cancelarEnvio()" class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">No</button>
        <button wire:click="submit" onclick="submit()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Sí, Enviar</button>
    </div>
  </div>
            </div>
        </div>



      </div>
<script>
    function confirmarEnvio() {
        // Mostrar el modal
        document.getElementById('modalConfirm').classList.remove('hidden');
    }

    function cancelarEnvio() {
        // Ocultar el modal
        document.getElementById('modalConfirm').classList.add('hidden');
    }

    function submit() {
        // Ocultar el modal
        document.getElementById('modalConfirm').classList.add('hidden');
        // Emitir el evento de envío
        Livewire.emit('submitForm');

        location.reload();
        @this.submit('submit');



    }

    document.addEventListener('livewire:load', function () {
        Livewire.on('submitForm', function () {
            @this.submit(); // Llama al método para enviar el formulario
            @this.validate();


        });
    });
    document.getElementById('submit').addEventListener('submit', function(event) {
        // Prevenir el envío del formulario para permitir la limpieza
        event.preventDefault();

        // Obtener los campos del formulario
        const formElements = event.target.elements;

        // Iterar sobre los elementos del formulario
        for (const element of formElements) {
            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {

            }
        }

        // Aquí puedes enviar el formulario si es necesario
        // event.target.submit();
        console.log('Formulario enviado con valores limpiados:', Object.fromEntries(new FormData(event.target)));
    });
    window.addEventListener('reloadAndRedirect', () => {
        // Recargar la página
        location.reload();

        // Esperar un momento antes de redirigir
        setTimeout(() => {
            window.location.href = '/successful';
        }, 1000);
    });
</script>
