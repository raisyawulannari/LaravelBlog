<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\JobLocationServiceImplement;
use App\Services\JobLocationServiceInterface;

class JobLocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobLocationServiceInterface::class, JobLocationServiceImplement::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
