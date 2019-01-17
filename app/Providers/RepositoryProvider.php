<?php

namespace App\Providers;


use App\Interfaces\Api\ApartmentsRepositoryInterfaces;
//use App\Interfaces\EmailServiceInterface;
use App\Repositories\Api\ApartmentsRepository;
//use App\Services\EmailService;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApartmentsRepositoryInterfaces::class, function ($app) {
            return $app->make(ApartmentsRepository::class);
        });
    }
}
