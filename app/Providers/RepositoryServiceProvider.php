<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Certificate\CertificateRepositoryInterface::class,
            \App\Repositories\Certificate\CertificateRepository::class
        );
        $this->app->bind(
            \App\Repositories\NumberRequest\NumberRequestRepositoryInterface::class,
            \App\Repositories\NumberRequest\NumberRequestRepository::class
        );
    }
}
