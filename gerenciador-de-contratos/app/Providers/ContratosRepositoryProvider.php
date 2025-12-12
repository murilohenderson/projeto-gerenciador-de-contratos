<?php

namespace App\Providers;

use App\Repositories\ContratosRepository;
use App\Repositories\EloquentContratosRepository;
use Illuminate\Support\ServiceProvider;

class ContratosRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public array $bindings = [
        ContratosRepository::class => EloquentContratosRepository::class
    ];
}
