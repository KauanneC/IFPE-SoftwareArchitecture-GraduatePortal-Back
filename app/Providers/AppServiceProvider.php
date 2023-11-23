<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domain\Repositories\IEventRepository;
use App\Domain\Repositories\IFormRepository;
use App\Domain\Repositories\IUserRepository;

use App\Http\Repositories\EloquentEventRepository;
use App\Http\Repositories\EloquentFormRepository;
use App\Http\Repositories\EloquentUserRepository;

// use App\Domain\Usecases\CreateEventUseCase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEventRepository::class, EloquentEventRepository::class);
        $this->app->bind(IFormRepository::class, EloquentFormRepository::class);
        $this->app->bind(IUserRepository::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
