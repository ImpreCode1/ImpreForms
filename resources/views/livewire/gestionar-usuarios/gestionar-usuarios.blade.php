<div>
    <x-app-layout>
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-center text-gray-900">Gestionar Usuarios</h2>
                    <p class="text-center text-gray-600 mt-2">Administra los usuarios de la plataforma</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4 border-b border-gray-200">
                        <input type="text" wire:model="search" placeholder="Buscar usuarios..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha de creación</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($userIdBeingEdited === $user->id)
                                            <select wire:model="newRol" class="text-sm border rounded px-2 py-1">
                                                <option value="Admin">Administrador</option>
                                                <option value="User">Usuario</option>
                                            </select>
                                            <button wire:click="updateRol" class="ml-2 text-green-600 hover:text-green-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                            <button wire:click="$set('userIdBeingEdited', null)" class="ml-1 text-gray-400 hover:text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        @else
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $user->rol === 'Admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                                {{ $user->rol }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button wire:click="confirmEditRol({{ $user->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button wire:click="confirmDelete({{ $user->id }})" class="text-red-600 hover:text-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

        @if($userIdBeingDeleted)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50">
            <div class="flex items-center justify-center h-full">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full mx-4">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-3">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Eliminar Usuario</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">¿Está seguro de que desea eliminar al usuario <strong>{{ $userNameBeingDeleted }}</strong>?</p>
                    <div class="flex justify-end">
                        <button wire:click="$set('userIdBeingDeleted', null)" class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button wire:click="deleteUser" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="fixed top-5 right-5 z-50 flex items-center p-4 text-sm text-green-800 bg-green-200 border-l-4 border-green-600 rounded-lg shadow-xl">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
        @endif
    </x-app-layout>
</div>