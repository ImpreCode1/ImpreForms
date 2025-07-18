<div>
    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
        <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl p-8 transform transition-all animate-fade-in-up">
            <!-- Ícono de éxito animado -->
            <div class="flex justify-center mb-8">
                <div class="rounded-full bg-green-100 p-4">
                    <svg class="w-16 h-16 text-green-500 animate-success-check" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Mensaje principal -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-3">¡Formulario Enviado Exitosamente!</h1>
                <p class="text-gray-600 text-lg mb-6">
                    Tu solicitud ha sido recibida y será procesada por nuestro equipo.
                </p>
                <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>El proceso puede tomar hasta 24-48 horas hábiles</span>
                </div>
            </div>

            <!-- Información del seguimiento -->
            <div class="bg-blue-50 rounded-xl p-6 mb-8">
                <h2 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Proceso de Revisión
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-blue-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Verificación de documentos
                    </li>
                    <li class="flex items-center text-blue-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Revisión por el PMO
                    </li>
                    {{-- <li class="flex items-center text-blue-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Aprobación financiera
                    </li> --}}
                </ul>
            </div>


            <div class="rounded-xl p-2 mb-8">
                <ul class="space-y-3">
                    <li
                        class="flex items-center text-amber-600 rounded-r-lg border-l-4 border-amber-500 bg-amber-50 p-4">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm">
                            <p class="font-semibold">Su formulario se podrá editar hasta que el proceso termine.</p>
                            <p class="mt-1 text-gray-700">Cuando haya terminado, puede <strong>cerrar esta pestaña
                                    manualmente</strong>.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div>


            </div>

            <style>
                @keyframes success-check {
                    0% {
                        transform: scale(0);
                        opacity: 0;
                    }

                    50% {
                        transform: scale(1.2);
                    }

                    100% {
                        transform: scale(1);
                        opacity: 1;
                    }
                }

                .animate-success-check {
                    animation: success-check 0.5s ease-out forwards;
                }

                @keyframes fade-in-up {
                    0% {
                        opacity: 0;
                        transform: translateY(20px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-fade-in-up {
                    animation: fade-in-up 0.6s ease-out forwards;
                }
            </style>

        </div>
    </div>
</div>
