<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PostServiceInterface;
use App\Services\PostServiceImplement;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Daftarkan binding untuk PostServiceInterface
        $this->app->bind(PostServiceInterface::class, PostServiceImplement::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrapping services
    }
}
