<x-app-layout>

        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header con estadísticas -->
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-center text-gray-900 mb-4">
                        Formularios Recibidos
                    </h1>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                            <p class="text-sm font-medium text-gray-500">Total Formularios</p>
                            <p class="text-2xl font-bold text-gray-900">50</p>
                            <div class="mt-2 flex items-center text-sm text-green-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                                <span>12% más que el mes pasado</span>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                            <p class="text-sm font-medium text-gray-500">Recientes</p>
                            <p class="text-2xl font-bold text-green-600">32</p>
                            <div class="mt-2 flex items-center text-sm text-green-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>64% del total</span>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                            <p class="text-sm font-medium text-gray-500">Por vencer </p>
                            <p class="text-2xl font-bold text-orange-600">12</p>
                            <div class="mt-2 flex items-center text-sm text-orange-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <span>24% del total</span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Barra de herramientas -->
                    <div class="p-6 border-b border-gray-200 bg-gray-50">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <!-- Buscador -->
                            <div class="max-w-md w-full">
                                <div class="relative group">
                                  <!-- Icono de búsqueda -->
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                  >
                                    <path
                                      fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"
                                    />
                                  </svg>

                                  <!-- Campo de entrada -->
                                  <input
                                    type="text"
                                    placeholder="Buscar por nombre, producto o estado..."
                                    class="w-full py-3 pl-11 pr-4
                                           text-gray-900 rounded-xl
                                           border-2 border-gray-200
                                           placeholder:text-gray-500
                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                           hover:border-gray-300
                                           transition-colors duration-200
                                           text-sm md:text-base
                                           bg-white shadow-sm"
                                  />
                                </div>
                              </div>
                            <!-- Filtros -->
                            <div class="flex flex-wrap gap-2">
                                <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    <option>Estados</option>
                                    <option>Actuales</option>
                                    <option>Suspendido</option>
                                </select>
                                <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    <option>Ordenar por</option>
                                    <option>Fecha - Reciente</option>
                                    <option>Fecha - Antiguo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="group px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2 text-sm font-semibold text-gray-600 cursor-pointer hover:text-gray-900">
                                            <span>Código del cliente </span>
                                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="group px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2 text-sm font-semibold text-gray-600 cursor-pointer hover:text-gray-900">
                                            <span>Nombre cliente </span>
                                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="group px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2 text-sm font-semibold text-gray-600 cursor-pointer hover:text-gray-900">
                                            <span>N° oportunidad </span>
                                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="group px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2 text-sm font-semibold text-gray-600 cursor-pointer hover:text-gray-900">
                                            <span>Documentos</span>
                                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="group px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2 text-sm font-semibold text-gray-600 cursor-pointer hover:text-gray-900">
                                            <span>Acciones</span>
                                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Fila 1 -->
                                <tr class="hover:bg-gray-50 transition-colors cursor-pointer">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white" src="/api/placeholder/40/40" alt="Ana Martínez"/>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">Ana Martínez</div>
                                                <div class="text-gray-500 text-sm">ana.martinez@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-900">Administrador</div>
                                        <div class="text-gray-500 text-sm">Nivel Superior</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-900">21 Ene, 2024</div>
                                        <div class="text-gray-500 text-sm">15:30</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-900 font-medium">43</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            <span class="w-2 h-2 mr-2 rounded-full bg-green-400"></span>
                                            Activo
                                        </span>
                                    </td>
                                </tr>
                                <!-- Más filas similares... -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                            <p class="text-sm text-gray-700">
                                Mostrando <span class="font-medium">1</span> a <span class="font-medium">4</span> de <span class="font-medium">50</span> entradas
                            </p>
                            <div class="flex items-center space-x-2">
                                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Anterior
                                </button>
                                <div class="flex items-center space-x-2">
                                    <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">1</button>
                                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">2</button>
                                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">3</button>
                                    <span class="px-4 py-2 text-sm font-medium text-gray-700">...</span>
                                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">12</button>
                                </div>
                                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Siguiente
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
