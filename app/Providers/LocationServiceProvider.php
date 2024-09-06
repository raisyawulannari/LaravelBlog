<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LocationServiceImplement;
use App\Services\LocationServiceInterface;
use App\Repositories\LocationRepository;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LocationServiceInterface::class, LocationServiceImplement::class);
    }
    public function boot()
    {
        //
    }
}
