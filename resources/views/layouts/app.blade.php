<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Elegant Sidebar -->
        <aside
            class="relative w-72 bg-white shadow-2xl border-r border-gray-200 transform transition-all duration-300 ease-in-out">
            <!-- Curved Top Decoration -->
            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-500 via-teal-400 to-white"></div>

            <!-- Logo and Branding -->
            <div class="pt-8 pb-6 px-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="/resource/logo2.jpg" alt="Logo" class="w-8 h-8 object-contain">
                    <h1 class="text-2xl font-bold text-gray-800 tracking-tight">ImpreForms</h1>
                </div>
            </div>

            <!-- User Profile -->
            <div class="px-6 py-6 text-center">
                <div class="relative inline-block">
                    <div class="w-24 h-24 mx-auto rounded-full border-4 border-white shadow-lg overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=f3f4f6&color=374151"
                            alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-0 right-0 bg-green-500 w-6 h-6 rounded-full border-2 border-white">
                    </div>
                </div>
                <h2 class="text-xl font-semibold text-gray-800 mt-2">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>

            <!-- Navigation Menu -->
            <nav class="px-4 space-y-1">
                @php
                    $menuItems = [];

                    if (Auth::user()->isAdmin()) {
                        $menuItems = [
                            [
                                'name' => 'Recibidos',
                                'route' => 'formularios-recibidos',
                                'icon' =>
                                    'M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z M17 21V13H7v8 M7 3v5h8',
                                'color' => 'text-red-500',
                            ],
                            [
                                'name' => 'Crear Usuario',
                                'route' => 'crear-usuario',
                                'icon' =>
                                    'M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2 M8.5 7a4 4 0 1 0 0-8 4 4 0 0 0 0 8z M20 8v6 M23 11h-6',
                                'color' => 'text-blue-500',
                            ],
                        ];
                    } else {
                        $menuItems = [
                            [
                                'name' => 'Formulario',
                                'route' => 'menu',
                                'icon' =>
                                    'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'color' => 'text-green-500',
                            ],
                            [
                                'name' => 'Historial',
                                'route' => 'historial',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                'color' => 'text-purple-500',
                            ],
                        ];
                    }
                @endphp

                @php
                    $currentRoute = session('current_route', request()->route()->getName());
                @endphp



                @foreach ($menuItems as $item)
                    <a href="{{ route($item['route']) }}"
                        onclick="event.preventDefault(); document.getElementById('set-current-route-{{ $item['route'] }}').submit();"
                        class="
                        group flex items-center px-4 py-2.5 rounded-lg transition-all duration-200 ease-in-out
                        {{ $currentRoute === $item['route'] || request()->is('enviar-formulario*')
                        ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-600'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}
                        ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 {{ $item['color'] }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="font-medium">{{ $item['name'] }}</span>
                        @if ($currentRoute === $item['route'] || request()->is('enviar-formulario*'))
                            <span class="ml-auto bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-xs">
                                Actual
                            </span>
                        @endif
                    </a>
                    <form id="set-current-route-{{ $item['route'] }}" action="{{ route('set.current.route') }}"
                        method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="route" value="{{ $item['route'] }}">
                    </form>
                @endforeach
            </nav>

            <!-- Logout Section -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="
                        w-full flex items-center justify-center
                        px-4 py-3 rounded-lg
                        bg-gradient-to-r from-red-500 to-red-700
                        text-white font-semibold
                        hover:from-red-600 hover:to-pink-600
                        transition-all duration-300 ease-in-out
                        transform hover:-translate-y-1 hover:scale-105
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main
            class="flex-1 min-h-screen bg-gradient-to-br from-red-50 via-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-8 transition-all duration-300 overflow-y-auto">
            <div class="p-6 max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
</body>

</html>
