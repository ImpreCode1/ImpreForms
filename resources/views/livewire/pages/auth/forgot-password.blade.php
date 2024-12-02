<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<main id="content" role="main" class="w-full max-w-md mx-auto p-6 ">
    <div class="mt-7 bg-white rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300 ">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">¿Has olvidado tu contraseña?</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    No te preocupes, solo déjanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                </p>
            </div>

            <div class="mt-5">
                <!-- Mensaje de estado de la sesión -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form wire:submit.prevent="sendPasswordResetLink">
                    <div class="grid gap-y-4">
                        <!-- Dirección de correo electrónico -->
                        <div>
                            <label for="email" class="block text-sm font-bold ml-1 mb-2 dark:text-white">Dirección de correo electrónico</label>
                            <div class="relative">
                                <x-text-input 
                                    wire:model="email"
                                    id="email"
                                    class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" 
                                    type="email"
                                    name="email"
                                    required 
                                    autofocus 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-600" />
                        </div>

                        <!-- Botón de envío -->
                        <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Recuperar Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


