<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;


class LoginForm extends Form
{


    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    protected $messages =[
        'email.required' => 'El espacio del correo tiene que ser requerido.',
        'email.email' => 'El email tiene que ser valido.',
        'password.required' => 'El espacio de Contraseña debe ser requerido.',
    ];

    public function authenticate(): string
    {
        $this->ensureIsNotRateLimited();

        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Las credenciales proporcionadas son incorrectas.',


            ]);
        }

        RateLimiter::clear($this->throttleKey());

        // Verificar el rol y retornar la ruta correspondiente
        $user = Auth::user();

        if ($user->rol === 'Admin') {
            return route('formularios-recibidos');
        } else {
            return route('menu');
        }
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());



    }
    // protected function messages()
    // {
    // ['email.required' => 'El correo electrónico es obligatorio.',
    //         'email.email' => 'El correo electrónico debe ser una dirección válida.',
    //         'password.required' => 'La contraseña es obligatoria.',
    //         'remember.boolean' => 'El valor de recordar debe ser verdadero o falso.',];
    // }
}
