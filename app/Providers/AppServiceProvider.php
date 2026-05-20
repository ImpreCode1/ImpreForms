<?php

namespace App\Providers;

use App\Models\Marca;
use App\Observers\MarcaObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Marca::observe(MarcaObserver::class);
    }
}
