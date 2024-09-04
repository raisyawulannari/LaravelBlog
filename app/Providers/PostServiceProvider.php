<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PostServiceInterface;
use App\Services\PostServiceImplement;

class PostServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(PostServiceInterface::class, PostServiceImplement::class);
    }

    public function boot()
    {
        //
    }
}
