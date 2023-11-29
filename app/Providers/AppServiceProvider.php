<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domain\Repositories\IResponseRepository;
use App\Domain\Repositories\INoticeRepository;
use App\Domain\Repositories\IEventRepository;
use App\Domain\Repositories\IFormRepository;
use App\Domain\Repositories\IUserRepository;

use App\Http\Repositories\EloquentResponseRepository;
use App\Http\Repositories\EloquentNoticeRepository;
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
        $this->app->bind(INoticeRepository::class, EloquentNoticeRepository::class);
        $this->app->bind(IResponseRepository::class, EloquentResponseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
