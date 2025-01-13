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
    public string $name ;
    public string $email;
    public string $password;
    public string $password_confirmation ;
   public string $role;


    /**
     * Handle an incoming registration request.
     */

     protected $messages = [
        'email.unique'=> 'Este email ya se encuentra en uso',
        'email.required' => 'Este campo es requerido',
        'name.required' => 'Este espacio es requerido',
        'password.required'  => 'Este espacio es requerido.',
        'password.confirmed' => 'La contraseña no coincide.',
        'password.min' => 'La contraseña debe contener minimo 8 caracteres'
    ];

     public function register(): void
    {

         $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','confirmed',Rules\Password::defaults()],
            session ()->flash ('message', 'Se ha registrado el usuario con éxito.');

        ]);

        // session ()->flash ('message', 'Se ha registrado el usuario con éxito.');

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }

};
?>

<div class="bg-gray-100 h-full min-h-screen">
<div >
    <h1 class="text-5xl font-bold mb-6 text-center m-10 text-stone-950 tracking-wide">
        Registro de un nuevo usuario
    </h1> </div>
    <div class="max-w-md mx-auto  bg-white p-6 rounded-lg shadow-sm shadow-slate-500  mt-10">
        <form wire:submit="register">
        <!-- Name -->
        <div class="mt-4 flex items-center">
            <svg  class="mb-4" width="15px" height="15px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 41.2 (35397) - http://www.bohemiancoding.com/sketch -->
                <title>ic_username</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                    <g id="24-px-Icons" transform="translate(-27.000000, -27.000000)" stroke="#000000">
                        <g id="ic_username" transform="translate(24.000000, 24.000000)">
                            <g id="Profile">
                                <g transform="translate(4.000000, 4.000000)" stroke-width="2">
                                    <circle id="Oval" cx="8" cy="4" r="4"></circle>
                                    <path d="M16,16 C16,11.581722 12.418278,8 8,8 C3.581722,8 0,11.581722 0,16" id="Oval-2"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>

            <x-input-label for="name" :value="__(' Nombre')" class="block font-medium text-gray-700 mb-3 text-sm ml-2" />
        </div>
        <x-text-input wire:model="name" id="name"
            class="block mt-1 w-full border-blue-700
            focus:border-blue-700 p-2" type="text" name="name"
            required autofocus autocomplete="name" placeholder="Nombre" />
        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />

        <!-- Email Address -->
        <div class="mt-4">
            <div class="mt-4 flex items-center">
                <svg class="mb-4 mr-2" width="18px" height="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
           <g>
               <path d="M448,64H64C28.656,64,0,92.656,0,128v256c0,35.344,28.656,64,64,64h384c35.344,0,64-28.656,64-64V128
                   C512,92.656,483.344,64,448,64z M342.656,234.781l135.469-116.094c0.938,3,1.875,6,1.875,9.313v256
                   c0,2.219-0.844,4.188-1.281,6.281L342.656,234.781z M448,96c2.125,0,4,0.813,6,1.219L256,266.938L58,97.219
                   C60,96.813,61.875,96,64,96H448z M33.266,390.25C32.828,388.156,32,386.219,32,384V128c0-3.313,0.953-6.313,1.891-9.313
                   L169.313,234.75L33.266,390.25z M64,416c-3.234,0-6.172-0.938-9.125-1.844l138.75-158.563l51.969,44.531
                   C248.578,302.719,252.297,304,256,304s7.422-1.281,10.406-3.875l51.969-44.531l138.75,158.563C454.188,415.062,451.25,416,448,416
                   H64z"/>
           </g><g></g><g> </g><g></g><g></g><g></g> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
           </svg>
                <x-input-label for="email" :value="__('Email')" class="block  font-medium text-gray-700 mb-3 text-sm"  />
        </div>
            <x-text-input wire:model="email" id="email" class=" block mt-1 w-full border-blue-700  focus:border-indigo-500 p-2" type="email" name="email" required autocomplete="username"  placeholder="Ingrese Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />

            </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="mt-4 flex items-center">


                <svg class="mb-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="20px" height="20px" viewBox="0 0 361.118 361.118" style="enable-background:new 0 0 361.118 361.118;"
                xml:space="preserve">
           <g>
               <g id="_x32_37._Locked">
                   <g>
                       <path d="M274.765,141.3V94.205C274.765,42.172,232.583,0,180.559,0c-52.032,0-94.205,42.172-94.205,94.205V141.3
                           c-17.34,0-31.4,14.06-31.4,31.4v157.016c0,17.344,14.06,31.402,31.4,31.402h188.411c17.341,0,31.398-14.059,31.398-31.402V172.7
                           C306.164,155.36,292.106,141.3,274.765,141.3z M117.756,94.205c0-34.69,28.12-62.803,62.803-62.803
                           c34.685,0,62.805,28.112,62.805,62.803V141.3H117.756V94.205z M274.765,329.715H86.354V172.708h188.411V329.715z
                            M164.858,262.558v20.054c0,8.664,7.035,15.701,15.701,15.701c8.664,0,15.701-7.037,15.701-15.701v-20.054
                           c9.337-5.441,15.701-15.456,15.701-27.046c0-17.348-14.062-31.41-31.402-31.41c-17.34,0-31.4,14.062-31.4,31.41
                           C149.159,247.102,155.517,257.117,164.858,262.558z"/>
                   </g> </g></g> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g> <g></g>
           </svg>
    <x-input-label for="password" :value="__('Contraseña')" class="block text-sm font-medium text-gray-700 mb-3" />
           </div>
    <div >
           <x-text-input wire:model="password" id="password" class=" block mt-1 w-full border-blue-700  focus:border-indigo-500 p-2"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Ingrese la Contraseña" />
                        </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />

            </div>

        <!-- Confirm Password -->
        <div class="mt-4">
        <div class="mt-4 flex items-center">
            <svg class="mb-4 mr-1" height="25px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g id="outline"><path d="M3.546,29.749,5.209,28.7A26.9,26.9,0,0,0,26.051,58.673a27.228,27.228,0,0,0,5.966.665A27.008,27.008,0,0,0,54.773,17.881a26.82,26.82,0,0,0-16.9-11.9,27.124,27.124,0,0,0-27.288,9.839,1,1,0,1,0,1.582,1.223A25.113,25.113,0,0,1,37.439,7.935a25,25,0,1,1-30.3,21.434l.878,1.385a1,1,0,0,0,1.689-1.07L7.439,26.1A1,1,0,0,0,6.06,25.79L2.476,28.06a1,1,0,1,0,1.07,1.689Z"/><path d="M29,43a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V39.63a4,4,0,1,0-6,0Zm3-8a2,2,0,0,1,2,2,1.971,1.971,0,0,1-.67,1.479,1,1,0,0,0-.33.743V42H31V39.222a1,1,0,0,0-.33-.743A1.971,1.971,0,0,1,30,37,2,2,0,0,1,32,35Z"/><path d="M33.083,12.917H30.917A7.926,7.926,0,0,0,23,20.833V27H20a1,1,0,0,0-1,1V49a1,1,0,0,0,1,1H44a1,1,0,0,0,1-1V28a1,1,0,0,0-1-1H41V20.833A7.926,7.926,0,0,0,33.083,12.917ZM25,20.833a5.923,5.923,0,0,1,5.917-5.916h2.166A5.923,5.923,0,0,1,39,20.833V27H37V21.833a4.922,4.922,0,0,0-4.917-4.916A5.088,5.088,0,0,0,27,22v5H25Zm10,1V27H29V22a3.086,3.086,0,0,1,3.083-3.083A2.92,2.92,0,0,1,35,21.833ZM43,29V48H21V29Z"/></g></svg>
            <x-input-label for="password_confirmation" :value="__('Confirme Contraseña')" class=" block text-sm font-medium text-gray-700 mb-3" />
        </div>
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class=" block mt-1 w-full border-blue-700  focus:border-indigo-500 p-2"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Repetir Contraseña" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />

            </div>
        <div class="mt-4">
            <div class="mt-4 flex items-center">
                <svg class="mb-3 " height="22px" version="1.1" width="36" height="36"  viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>administrator-solid</title>
                    <circle cx="14.67" cy="8.3" r="6" class="clr-i-solid clr-i-solid-path-1"></circle><path d="M16.44,31.82a2.15,2.15,0,0,1-.38-2.55l.53-1-1.09-.33A2.14,2.14,0,0,1,14,25.84V23.79a2.16,2.16,0,0,1,1.53-2.07l1.09-.33-.52-1a2.17,2.17,0,0,1,.35-2.52,18.92,18.92,0,0,0-2.32-.16A15.58,15.58,0,0,0,2,23.07v7.75a1,1,0,0,0,1,1H16.44Z" class="clr-i-solid clr-i-solid-path-2"></path><path d="M33.7,23.46l-2-.6a6.73,6.73,0,0,0-.58-1.42l1-1.86a.35.35,0,0,0-.07-.43l-1.45-1.46a.38.38,0,0,0-.43-.07l-1.85,1a7.74,7.74,0,0,0-1.43-.6l-.61-2a.38.38,0,0,0-.36-.25H23.84a.38.38,0,0,0-.35.26l-.6,2a6.85,6.85,0,0,0-1.45.61l-1.81-1a.38.38,0,0,0-.44.06l-1.47,1.44a.37.37,0,0,0-.07.44l1,1.82A7.24,7.24,0,0,0,18,22.83l-2,.61a.36.36,0,0,0-.26.35v2.05a.36.36,0,0,0,.26.35l2,.61a7.29,7.29,0,0,0,.6,1.41l-1,1.9a.37.37,0,0,0,.07.44L19.16,32a.38.38,0,0,0,.44.06l1.87-1a7.09,7.09,0,0,0,1.4.57l.6,2.05a.38.38,0,0,0,.36.26h2.05a.38.38,0,0,0,.35-.26l.6-2.05a6.68,6.68,0,0,0,1.38-.57l1.89,1a.38.38,0,0,0,.44-.06L32,30.55a.38.38,0,0,0,.06-.44l-1-1.88a6.92,6.92,0,0,0,.57-1.38l2-.61a.39.39,0,0,0,.27-.35V23.82A.4.4,0,0,0,33.7,23.46Zm-8.83,4.72a3.34,3.34,0,1,1,3.33-3.34A3.34,3.34,0,0,1,24.87,28.18Z" class="clr-i-solid clr-i-solid-path-3"></path>
                    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                </svg>
                <x-input-label for="role" :value="__('Selecciona un Rol')" class=" block text-sm font-medium text-gray-700 mb-3" />
        </div>
            <select wire:model="role" id="role" class=" block mt-1 w-full border-blue-700  focus:border-indigo-500 p-2">
                <option value="" disabled selected>{{ __('Seleccione un rol') }}</option>
                <option value="admin">{{ __('Administrador') }}</option>
                <option value="superadmin">{{ __('Usuario') }}</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500 text-sm" />

            </div>
        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-blue-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button  class="bg-indigo-500 text-white  hover:bg-indigo-700 rounded-md py-2 px-4 transition duration-200 ms-4" type="button"   onclick="confirmarEnvio()">
                {{ __('Registrar') }}
            </x-primary-button>

        </div>
    </form>
</div>


@if (session()->has('message'))
            <div class="mt-4 text-green-600">{{ session('message') }}</div>
        @endif

        <!-- Modal de Confirmación -->
        <div id="modalConfirm" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden">
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
        <h3 class="text-lg font-medium text-gray-900">Nuevo usuario</h3>
    </div>
    <p class="mt-2 text-sm text-gray-600">¿Está seguro de que desea crear este usuario?</p>
    <div class="mt-4 flex justify-end">
        <button onclick="cancelarEnvio()" class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">No</button>
        <button wire:click="register" onclick="register()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Sí, crear</button>
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

        function register() {
            // Ocultar el modal
            document.getElementById('modalConfirm').classList.add('hidden');
            // Emitir el evento de envío
            Livewire.emit('submitForm');

            location.reload();

        }

        document.addEventListener('livewire:load', function () {
            Livewire.on('submitForm', function () {
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
                    element.value = element.value.trim();
                }
            }

            // Aquí puedes enviar el formulario si es necesario
            // event.target.submit();
            console.log('Formulario enviado con valores limpiados:', Object.fromEntries(new FormData(event.target)));
        });
    </script>
