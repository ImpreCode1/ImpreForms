<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="flex flex-col w-64 bg-white shadow-lg">
            <!-- Logo/Branding -->
            <div class="flex items-center justify-center h-20 shadow-md">
                <h2 class="text-2xl font-bold">Panel Usuario</h2>
            </div>
    
            <!-- Profile Section -->
            <div class="flex flex-col items-center py-6 border-b">
                <div class="h-24 w-24 rounded-full overflow-hidden">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-xl font-semibold">Juan Pérez</h2>
                <p class="text-gray-600">Usuario</p>
                <p class="text-sm text-gray-500">usuario@ejemplo.com</p>
            </div>
    
            <!-- Navigation -->
            <nav class="flex-grow">
                <div class="px-4 py-2 space-y-1">
                    <!-- Formularios -->
                    <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-800 rounded-lg">
                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Formularios
                    </a>
                </div>
            </nav>
    
            <!-- Logout -->
            <div class="p-4 border-t">
                <button class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg">
                    <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Cerrar Sesión
                </button>
            </div>
        </div>
    
        
        <div class="flex-grow p-6">
            {{ $slot ?? 'Contenido principal' }}
        </div>
    </div>
</x-app-layout>
