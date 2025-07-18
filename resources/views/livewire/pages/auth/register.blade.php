<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $rol = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'regex:/^[\pL\s]+$/u',
                    'max:255',
                    'min:2',
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:' . User::class,
                ],
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'min:5',
                    // 'regex:/[a-z]/',
                    // 'regex:/[A-Z]/',
                    // 'regex:/[0-9]/',
                    // 'regex:/[@$!%*?&]/',
                    // Rules\Password::defaults(),
                ],
                'password_confirmation' => [
                    'required',
                ],
                'rol' => [
                    'required',
                    'string',

                ],
            ],
            [
                'name.required' => 'El campo nombre es obligatorio.',
                'name.string' => 'El campo nombre debe ser una cadena de texto.',
                'name.regex' => 'El campo nombre solo puede contener letras y espacios.',
                'name.max' => 'El nombre no puede tener más de 255 caracteres.',
                'name.min' => 'El nombre debe tener al menos 2 caracteres.',
                'email.required' => 'El campo correo electrónico es obligatorio.',
                'email.string' => 'El correo electrónico debe ser una cadena de texto.',
                'email.email' => 'El correo electrónico debe ser una dirección válida.',
                'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
                'email.unique' => 'Este correo electrónico ya está registrado.',
                'password.required' => 'El campo contraseña es obligatorio.',
                'password.string' => 'La contraseña debe ser una cadena de texto.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
                'password.min' => 'La contraseña debe tener al menos :min caracteres.',
                // 'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y un carácter especial.',
                'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio.',

                'rol.required' => 'El campo rol es obligatorio.',
                'rol.string' => 'El campo rol debe ser una cadena de texto.',

            ],
        );

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // Auth::login($user);

        // $this->redirect(RouteServiceProvider::HOME, navigate: true);

        // return redirect()->route('crear-usuario');
        session()->flash('success', 'Usuario registrado exitosamente.');
        $this->redirect(route('crear-usuario'));
    }
}; ?>

<div>
    <x-app-layout>

        <br>
        <br>

        <div class="max-w-md mx-auto">
            <div class="text-center mb-2">
                <div class="inline-flex p-3 rounded-full bg-indigo-100 mb-4">
                    <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Crear Cuenta</h2>
                <p class="mt-2 text-sm text-gray-600">Complete los datos para registrar usuarios a nuestra plataforma
                </p>
            </div>

            <div
                class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-white/20 transition-all duration-300 hover:shadow-indigo-100 w-full h-full">
                <form wire:submit.prevent="register">
                    <!-- Name -->
                    <div class="max-w-md mx-auto">

                        <!-- Name -->
                        <div class="group">
                            <div class="mt-4">
                                <div
                                    class="flex items-center text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <x-input-label for="name" :value="__('Nombre')"
                                        class="block font-medium text-gray-700 text-sm ml-2" />
                                </div>
                            </div>
                            <x-text-input wire:model="name" id="name"
                                class="block w-full px-4 py-2 mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                type="text" name="name" required autofocus autocomplete="name"
                                placeholder="Nombre" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <!-- Email -->
                        <div class="group">
                            <div class="mt-4">
                                <div
                                    class="flex items-center text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <x-input-label for="email" :value="__('Email')"
                                        class="block font-medium text-gray-700 text-sm ml-2" />
                                </div>
                            </div>
                            <x-text-input wire:model="email" id="email"
                                class="block w-full px-4 py-2 mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                type="email" name="email" required autocomplete="username"
                                placeholder="Ingrese Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <!-- Password -->
                        <div class="group">
                            <div class="mt-4">
                                <div
                                    class="flex items-center text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                        </rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <x-input-label for="password" :value="__('Contraseña')"
                                        class="block font-medium text-gray-700 text-sm ml-2" />
                                </div>
                            </div>
                            <x-text-input wire:model="password" id="password"
                                class="block w-full px-4 py-2 mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                type="password" name="password" required autocomplete="new-password"
                                placeholder="Ingrese la Contraseña" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="group">
                            <div class="mt-4">
                                <div
                                    class="flex items-center text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                        </rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <x-input-label for="password_confirmation" :value="__('Confirme Contraseña')"
                                        class="block font-medium text-gray-700 text-sm ml-2" />
                                </div>
                            </div>
                            <x-text-input wire:model="password_confirmation" id="password_confirmation"
                                class="block w-full px-4 py-2 mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                type="password" name="password_confirmation" required autocomplete="new-password"
                                placeholder="Repetir Contraseña" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <!-- Role Selection -->
                        <div class="group">
                            <div class="mt-4">
                                <div
                                    class="flex items-center text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <x-input-label for="rol" :value="__('Selecciona un Rol')"
                                        class="block font-medium text-gray-700 text-sm ml-2" />
                                </div>
                            </div>
                            <select wire:model="rol" id="rol"
                                class="block w-full px-4 py-2 mt-1 text-gray-900 border-indigo-500 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <option value="" disabled selected>{{ __('Seleccione un rol') }}</option>
                                <option value="Admin">{{ __('Administrador') }}</option>
                                <option value="User">{{ __('Usuario') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('rol')" class="mt-2 text-red-500 text-sm" />
                        </div>
                        {{-- <div class="flex items-center justify-between mt-6"> --}}

                        <br>
                        <br>
                        <div class="pt-2">
                            <x-primary-button
                                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] space-x-2"
                                type="button" onclick="confirmarEnvio()">
                                {{ __('Registrar') }}
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </x-primary-button>
                        </div>

                    </div>
                </form>
            </div>


            {{-- formulario enviado --}}
        </div>
        @if (session('success'))
        <div id="alert" class="w-80 fixed top-5 right-5 z-50 flex items-center p-4 text-sm text-green-800 bg-green-200 border-l-4 border-green-600 rounded-lg shadow-xl transition-opacity opacity-0 animate-fade-in" role="alert">
            <!-- Icono -->
            <div class="flex-shrink-0 h-8 w-8 flex items-center justify-center rounded-full bg-green-600 text-white shadow-md">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <!-- Texto -->
            <div class="ml-3 flex-1">
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
            <!-- Botón de cerrar -->
            <button type="button" class="ml-2 p-1 text-green-700 hover:text-green-900 hover:bg-green-300 rounded-full focus:ring-2 focus:ring-green-500 transition-all duration-200" aria-label="Cerrar" onclick="closeAlert();">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.293 7.293a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 011.414 1.414L11.414 12l2.293 2.293a1 1 0 01-1.414 1.414L10 13.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 12 6.293 9.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(-10%);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Animación para desvanecer después de un tiempo */
            @keyframes fade-out {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
            }

            .animate-fade-in {
                animation: fade-in 1s ease-out; /* Aumenta el tiempo de animación a 1 segundo */
            }

            /* Añade un retraso para que la alerta desaparezca después de 3 segundos */
            .fade-out {
                animation: fade-out 1s ease-out forwards;
                animation-delay: 3s; /* Esto la hace desaparecer 3 segundos después */
            }

            .shadow-md {
                box-shadow: 0 4px 6px rgba(0, 128, 0, 0.1), 0 2px 4px rgba(0, 128, 0, 0.06);
            }
        </style>


        @endif
        <div id="modalConfirm" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden">
            <div class="flex items-center justify-center h-full">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-12 w-12 rounded-full bg-yellow-100 sm:h-10 sm:w-10 flex items-center justify-center mr-3">
                            <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Nuevo usuario</h3>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">¿Está seguro de que desea crear este usuario?</p>
                    <div class="mt-4 flex justify-end">
                        <button onclick="cancelarEnvio()"
                            class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">No</button>
                        <button wire:click="register" onclick="register()"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Sí, crear</button>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>

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

    function register() {
        // Ocultar el modal
        document.getElementById('modalConfirm').classList.add('hidden');
        // Emitir el evento de envío
        Livewire.emit('submitForm');
        setTimeout(() => {
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
        }, 100);
        location.reload();
        @this.reload('register');



    }

    document.addEventListener('livewire:load', function() {
        Livewire.on('submitForm', function() {
            @this.register(); // Llama al método para enviar el formulario
            @this.validate();


        });
    });
    document.getElementById('register').addEventListener('submit', function(event) {
        // Prevenir el envío del formulario para permitir la limpieza
        event.preventDefault();

        // Obtener los campos del formulario
        const formElements = event.target.elements;

        // Iterar sobre los elementos del formulario
        for (const element of formElements) {
            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                // Eliminar espacios en blanco
            }
        }

        // Aquí puedes enviar el formulario si es necesario
        // event.target.submit();
        console.log('Formulario enviado con valores limpiados:', Object.fromEntries(new FormData(event
            .target)));
    });
</script>
