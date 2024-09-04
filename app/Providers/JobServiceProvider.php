<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\JobServiceInterface;
use App\Services\JobServiceImplement;


class JobServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(JobServiceInterface::class, JobServiceImplement::class);
    }

    public function boot()
    {
        //
    }
}
