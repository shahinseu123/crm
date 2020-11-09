<?php

namespace App\Providers;

use App\Interfaces\user_interface\UserInterface;
use App\Repository\user_repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
    }
}
