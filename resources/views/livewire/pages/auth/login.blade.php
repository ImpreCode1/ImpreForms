<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
        $this->redirect(session('url.intended', RouteServiceProvider::HOME));

    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 p-4">
  <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl overflow-hidden grid md:grid-cols-2">
    <!-- Left Side: Decorative Section -->
    <div class="bg-gradient-to-br from-[#6a11cb] to-[#2575fc] flex items-center justify-center p-12 relative">
      <div class="text-white text-center z-10">
        <h2 class="text-4xl font-bold mb-6 tracking-tight">ImpreForms</h2>
        <p class="text-lg opacity-80 leading-relaxed">
          Transforma la gestión de formularios con nuestra plataforma intuitiva y eficiente. Simplifica procesos, ahorra tiempo y mejora la productividad.
        </p>
        <div class="absolute top-0 left-0 w-full h-full opacity-20 bg-pattern"></div>
      </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="p-12 flex items-center">
      <form wire:submit="login" class="w-full space-y-6" novalidate>
        <div class="text-center mb-8">
          <h3 class="text-3xl font-bold text-gray-800 mb-2">Iniciar Sesión</h3>
          <p class="text-gray-500">Accede a tu cuenta personal</p>
        </div>

            <!-- Error Message -->
        @if ($errors->has('email'))
            <div class="text-sm text-red-500 text-center mb-4">{{ $errors->first('email') }}</div>
        @endif

        <!-- Email Input -->
        <div class="relative">
          <input
            wire:model="form.email"
            type="email"
            placeholder="Correo electrónico"

            class="w-full px-4 py-3.5 pl-10 rounded-xl border-2 border-gray-200
                   focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                   transition duration-300 ease-in-out  @error('form.email') border-red-500 @enderror"
          />

          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>

         @error('form.email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

        </div>

        <!-- Password Input -->
        <div class="relative">
          <input
            wire:model="form.password"
            type="password"
            placeholder="Contraseña"

            class="w-full px-4 py-3.5 pl-10 rounded-xl border-2 border-gray-200
                   focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                   transition duration-300 ease-in-out @error('form.password') border-red-500 @enderror"
          />
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>

          @error('form.password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

        </div>

        <!-- Forgot Password -->
        <div class="flex justify-between items-center">
          <label class="flex items-center space-x-2">
            <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
            <span class="text-gray-600">Recuérdame</span>
          </label>
          <a
            href="{{ route('password.request') }}"
            wire:navigate
            class="text-sm text-indigo-600 hover:text-indigo-800 transition duration-300"
          >
            ¿Olvidaste tu contraseña?
          </a>
        </div>

        <!-- Login Button -->
        <button
          type="submit"
          class="w-full py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl
                 hover:from-indigo-700 hover:to-purple-700
                 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                 transition duration-300 transform hover:scale-[1.02] active:scale-[0.98]"
        >
          Iniciar Sesión
        </button>

        <!-- Social Login -->
        <div class="text-center">
          <div class="flex items-center justify-center space-x-4 mt-6">

          </div>
        </div>
      </form>
    </div>
  </div>
</div>






