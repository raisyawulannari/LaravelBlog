<?php

namespace App\Providers;

use App\Repositories\JobRepository;
use App\Services\JobService;
use App\Services\JobServiceImplement;
use App\Repositories\LocationRepository;
use App\Services\LocationServiceImplement;
use App\Services\PostService;
use App\Services\PostServiceImplement;
use App\Services\LocationServiceInterface;
use App\Services\JobLocationServiceImplement;
use App\Services\JobLocationServiceInterface;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Binding untuk Job
        $this->app->bind(PostService::class, PostServiceImplement::class);
        $this->app->bind(JobService::class, JobServiceImplement::class);
        $this->app->bind(JobRepository::class);
        $this->app->bind(JobLocationServiceInterface::class, JobLocationServiceImplement::class);


        // Binding untuk Location
        $this->app->bind(LocationRepository::class, function ($app) {
            return new LocationRepository(new \App\Models\Location());
        });

        $this->app->bind(LocationServiceInterface::class, LocationServiceImplement::class);
    }

    public function boot()
    {
        // Ini digunakan untuk bootstrap layanan.
    }
}
