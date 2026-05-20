<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body
    x-data="{
        sidebarOpen: localStorage.getItem('sidebar') !== 'false',
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
            localStorage.setItem('sidebar', this.sidebarOpen);
        }
    }"
    class="font-sans antialiased bg-gray-100 h-full">

    <div class="flex h-full min-h-screen">

        {{-- Sidebar --}}
        <aside
            :class="sidebarOpen ? 'w-64' : 'w-16'"
            class="fixed left-0 top-0 bottom-0 bg-white shadow-2xl border-r border-gray-200 z-40
                   transition-all duration-300 ease-in-out flex flex-col overflow-hidden">

            {{-- Header: Logo + Botón toggle --}}
            <div class="flex items-center justify-between px-3 py-4 border-b border-gray-100 flex-shrink-0">
                <div class="flex items-center gap-2 overflow-hidden">
                    <img src="/resource/logo2.jpg" alt="Logo"
                         class="w-8 h-8 object-contain flex-shrink-0">
                    <span
                        x-show="sidebarOpen"
                        x-transition:enter="transition-opacity duration-200 delay-100"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="text-xl font-bold text-gray-800 tracking-tight truncate whitespace-nowrap">
                        ImpreForms
                    </span>
                </div>
                <button @click="toggleSidebar()"
                    class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700
                           transition-colors flex-shrink-0 ml-1">
                    <svg x-show="sidebarOpen" class="w-5 h-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 19l-7-7 7-7M19 19l-7-7 7-7"/>
                    </svg>
                    <svg x-show="!sidebarOpen" class="w-5 h-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            {{-- User info (visible solo cuando está abierto) --}}
            <div class="px-4 py-4 border-b border-gray-100 flex-shrink-0"
                 x-show="sidebarOpen"
                 x-transition:enter="transition-opacity duration-200 delay-100"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity duration-100"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="flex flex-col items-center text-center">
                    <div class="relative inline-block mb-3">
                        <div class="w-16 h-16 rounded-full border-4 border-white shadow-lg overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=f3f4f6&color=374151"
                                 alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute bottom-0 right-0 bg-green-500 w-4 h-4 rounded-full border-2 border-white"></div>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-800 leading-tight">{{ Auth::user()->name }}</h2>
                    <p class="text-xs text-gray-500 truncate max-w-full">{{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto py-3 px-2">
                <div x-data="{
                        currentRoute: '{{ request()->route()->getName() }}',
                        setCurrentRoute(route) {
                            this.currentRoute = route;
                            localStorage.setItem('currentRoute', route);
                        }
                    }"
                    x-init="let s = localStorage.getItem('currentRoute'); if (s) currentRoute = s;"
                    class="space-y-1">

                    @php
                        $menuItems = Auth::user()->isAdmin()
                            ? [
                                [
                                    'name'  => 'Recibidos',
                                    'route' => 'formularios-recibidos',
                                    'icon'  => 'M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                    'color' => 'text-red-500',
                                ],
                                [
                                    'name'  => 'Seguimiento',
                                    'route' => 'seguimiento.index',
                                    'icon'  => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                                    'color' => 'text-green-500',
                                ],
                                [
                                    'name'  => 'Subir reporte',
                                    'route' => 'cargar-reporte',
                                    'icon'  => 'M13 10V3L4 14h7v7l9-11h-7z',
                                    'color' => 'text-yellow-500',
                                ],
                                [
                                    'name'  => 'Gestionar Usuarios',
                                    'route' => 'gestionar-usuarios',
                                    'icon'  => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                                    'color' => 'text-blue-500',
                                ],
                                [
                                    'name'  => 'Correos',
                                    'route' => 'correos',
                                    'icon'  => 'M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z',
                                    'color' => 'text-gray-600',
                                ],
                                [
                                    'name'  => 'Exportar a Excel',
                                    'route' => 'exportar',
                                    'icon'  => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                    'color' => 'text-green-600',
                                ],
                            ]
                            : [
                                [
                                    'name'  => 'Formulario',
                                    'route' => 'menu',
                                    'icon'  => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                    'color' => 'text-green-500',
                                ],
                                [
                                    'name'  => 'Historial',
                                    'route' => 'historial',
                                    'icon'  => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                    'color' => 'text-purple-500',
                                ],
                            ];
                    @endphp

                    @foreach ($menuItems as $item)
                        <a href="{{ route($item['route']) }}"
                           @click="setCurrentRoute('{{ $item['route'] }}')"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-200 ease-in-out"
                           :class="{
                               'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-600': currentRoute === '{{ $item['route'] }}',
                               'text-gray-600 hover:bg-gray-100 hover:text-gray-800': currentRoute !== '{{ $item['route'] }}',
                               'justify-center': !sidebarOpen
                           }">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 flex-shrink-0 {{ $item['color'] }}"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="{{ $item['icon'] }}" />
                            </svg>
                            <span
                                x-show="sidebarOpen"
                                x-transition:enter="transition-opacity duration-150 delay-100"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition-opacity duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="font-medium text-sm truncate whitespace-nowrap">
                                {{ $item['name'] }}
                            </span>
                            <span
                                x-show="sidebarOpen && currentRoute === '{{ $item['route'] }}'"
                                class="ml-auto bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-xs flex-shrink-0 whitespace-nowrap">
                                Actual
                            </span>
                        </a>
                    @endforeach

                </div>
            </nav>

            {{-- Logout --}}
            <div class="border-t border-gray-200 p-2 flex-shrink-0">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center rounded-lg bg-gradient-to-r from-red-500 to-red-700
                               text-white font-semibold hover:from-red-600 hover:to-pink-600
                               transition-all duration-300 ease-in-out py-2.5"
                        :class="sidebarOpen ? 'px-4 gap-3' : 'justify-center px-0'">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 flex-shrink-0"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span
                            x-show="sidebarOpen"
                            x-transition:enter="transition-opacity duration-150 delay-100"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity duration-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap">
                            Cerrar Sesión
                        </span>
                    </button>
                </form>
            </div>

        </aside>

        {{-- Contenido principal --}}
        <main
            :class="sidebarOpen ? 'ml-64' : 'ml-16'"
            class="flex-1 min-h-screen bg-gradient-to-br from-red-50 via-indigo-50 to-purple-50
                   transition-all duration-300 ease-in-out overflow-x-auto">
            <div class="content-container page-transition">
                {{ $slot }}
            </div>
        </main>

    </div>

    @livewireScripts
</body>

</html>
