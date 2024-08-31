<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PostService;
use App\Services\PostServiceImplement;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PostService::class, PostServiceImplement::class);
    }
    public function boot()
    {
<<<<<<< Updated upstream
        // Ini digunakan untuk bootstrap layanan.
=======

>>>>>>> Stashed changes
    }
}
