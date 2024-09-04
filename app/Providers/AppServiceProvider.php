<?php

namespace App\Providers;

use App\Repositories\JobRepository;
use App\Services\JobService;
use App\Services\JobServiceImplement;
use App\Services\PostService;
use App\Services\PostServiceImplement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostService::class, PostServiceImplement::class);
        $this->app->bind(JobService::class, JobServiceImplement::class);
        $this->app->bind(JobRepository::class);

    }

    public function boot()
    {
        // Ini digunakan untuk bootstrap layanan.
    }
}