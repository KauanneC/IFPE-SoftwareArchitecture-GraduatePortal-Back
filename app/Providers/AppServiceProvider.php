<?php

namespace App\Providers;

use App\Domain\Repositories\IEventRepository;
use App\Http\Repositories\EloquentEventRepository;
use Illuminate\Support\ServiceProvider;

// use App\Domain\Usecases\CreateEventUseCase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEventRepository::class, EloquentEventRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
