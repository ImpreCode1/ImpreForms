<div>
    <x-app-layout>
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-center text-gray-900">Gestionar Usuarios</h2>
                    <p class="text-center text-gray-600 mt-1 text-sm">Administra los usuarios de la plataforma</p>
                </div>

                <form method="GET" action="{{ route('gestionar-usuarios') }}" class="mb-4">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Buscar usuarios..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </form>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto" style="max-height: 60vh; overflow-y: auto;">
                        <table class="w-full min-w-full">
                            <thead class="bg-gray-50 sticky top-0 z-10">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-900 max-w-xs truncate">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">{{ $user->email }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <form method="POST" action="{{ route('usuarios.updateRol', $user->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <select name="rol" onchange="this.form.submit()" 
                                                class="text-xs border border-gray-300 rounded px-2 py-1.5 bg-white min-w-[100px] cursor-pointer hover:border-indigo-400 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                                <option value="Admin" {{ $user->rol === 'Admin' ? 'selected' : '' }}>Administrador</option>
                                                <option value="User" {{ $user->rol === 'User' ? 'selected' : '' }}>Usuario</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                        <form method="POST" action="{{ route('usuarios.destroy', $user->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 p-1" onclick="return confirm('¿Eliminar usuario?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="px-4 py-3 border-t border-gray-200 bg-gray-50">
                        @include('components.pagination', ['paginator' => $users])
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="fixed top-5 right-5 z-50 flex items-center p-4 text-sm text-green-800 bg-green-200 border-l-4 border-green-600 rounded-lg shadow-xl">
            {{ session('success') }}
        </div>
        @endif
    </x-app-layout>
</div>