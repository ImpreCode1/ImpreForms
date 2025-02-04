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

            <form wire:submit.prevent="submit" id="multiStepForm"
                class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 space-y-6">
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
                                    class="ri-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Código de cliente" value="{{ $cliente }}"  disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Nombre del cliente
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-user-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Nombre completo" value="{{$nombre}}" disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                N° oportunidad CRM
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-task-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input
                                    class="pl-12 w-full input-gradient border-2 border-blue-100 rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 cursor-not-allowed"
                                    type="text" placeholder="Número de oportunidad" value="{{$crm}}" disabled>
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


                    <div class="space-y-4">
                        <div>
                            <label for="plazo" class="block text-gray-700 text-sm font-bold mb-2">
                                Plazo
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-time-line absolute left-3 top-1/2 transform -translate-y-1/2  {{ $errors->has('plazo') ? 'text-red-500' : 'text-gray-400' }}"></i>
                                <input id="plazo" wire:model="plazo" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2
                                      {{ $errors->has('plazo') ? 'border-red-300' : 'border-blue-100' }}
                                    rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" placeholder="Duracion del plazo">

                            </div>
                            @error('plazo')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label for="pago" class="block text-gray-700 text-sm font-bold mb-2">
                                Forma De Pago
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-bank-card-line absolute left-3 top-1/2 transform -translate-y-1/2
                                       {{ $errors->has('pago') ? 'text-red-500' : 'text-gray-400' }}"></i></i>
                                <input id="pago" wire:model="pago" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2
                                      {{ $errors->has('pago') ? 'border-red-300' : 'border-blue-100' }}
                                    rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500
                                    focus:border-transparent transition duration-300"
                                    type="text" value="{{$pago}}" placeholder="Forma de pago">

                            </div>
                            @error('pago')
                                <span class="text-sm text-red-500 ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="moneda" class="block text-gray-700 text-sm font-bold mb-2">
                                Moneda
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-money-dollar-circle-line absolute left-3 top-1/2 transform -translate-y-1/2
                                {{ $errors->has('moneda') ? 'text-red-500' : 'text-gray-400' }}"></i>

                                <input id="moneda" wire:model="moneda" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2
                                    {{ $errors->has('moneda') ? 'border-red-300' : 'border-blue-100' }}
                                    rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" value="{{$moneda}}" placeholder="Moneda">


                            </div>
                            @error('moneda')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="garantia" class="block text-gray-700 text-sm font-bold mb-2">
                                Garantías de Crédito
                            </label>
                            <div class="relative">
                                <i
                                    class="ri-lock-line absolute left-3 top-1/2 transform -translate-y-1/2
                                {{ $errors->has('garantia') ? 'text-red-500' : 'text-gray-400 ' }}"></i>


                                <input id="garantia" wire:model="garantia" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2
                                    {{ $errors->has('garantia') ? 'border-red-300' : 'border-blue-100' }}
                                    rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" placeholder="Garantías">


                            </div>
                            @error('garantia')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                ¿Hay existencia de anticipo?
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="hasAdvancePayment" value="si"
                                        wire:model="hasAdvancePayment" wire:click="setAdvancePayment('si')">
                                    <span class="ml-2 text-gray-500">Sí</span>
                                </label>
                                <label for="no" class="inline-flex items-center">
                                    <input id="no" type="radio" class="form-radio" name="hasAdvancePayment" value="no"
                                        wire:model="no" wire:click="setAdvancePayment('no')" checked>
                                    <span class="ml-2 text-gray-500">No</span>
                            </div>
                            @error('si')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        </div>




                        <div id="advancePaymentFieldsi
                            class="{{ $hasAdvancePayment === 'si' ? '' : 'hidden' }} space-y-4">

                            <div>
                                <label for="anticipo" class="block text-gray-700 text-sm font-bold mb-2">
                                    Porcentaje de anticipo
                                </label>
                                <div class="relative">
                                    <i class="ri-percent-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input id="anticipo" wire:model="anticipo" autocomplete="off"
                                        class="pl-12 w-full input-gradient border-2
                                        {{ $errors->has('anticipo') ? 'border-red-300' : 'border-blue-100' }}
                                        rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                        type="text" placeholder="Porcentaje de anticipo"
                                        @if ($anticipo) value="{{ $anticipo }}" @endif>
                                </div>
                                @error('anticipo')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>



                            <div>
                                <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">
                                    Fecha de pago del anticipo
                                </label>
                                <div class="relative">
                                    <i class="ri-calendar-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input id="fecha" wire:model="fecha" autocomplete="off"
                                        class="pl-12 w-full input-gradient border-2
                                        {{ $errors->has('fecha') ? 'border-red-300' : 'border-blue-100' }}
                                        rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                        type="date" placeholder="Fecha de pago">
                                </div>
                                @error('fecha')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="otros" class="block text-gray-700 text-sm font-bold mb-2">
                                Otros
                            </label>
                            <div class="relative">
                                <i class="ri-more-2-line absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                                <input id="otros" wire:model="otros" autocomplete="off"
                                    class="pl-12 w-full input-gradient border-2
                                    {{ $errors->has('otros') ? 'border-red-300' : 'border-blue-100' }}
                                    rounded-xl py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    type="text" value="{{$otros}}" placeholder="Opcional">
                            </div>
                            @error('otros')
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

                        <div class="flex justify-between">
                            <button wire:click="changeStep(1)" type="button"
                                    class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg">
                                <i class="ri-arrow-left-line mr-2"></i> Anterior
                            </button>

                            <button type="button" onclick="confirmarEnvio()"
                                    class="flex items-center bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-3 px-7 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                                Enviar <i class="ri-send-plane-line ml-2"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>




    </div>
  {{-- este enlace deja que livewire interactue con la alerta --}}
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

</script>


