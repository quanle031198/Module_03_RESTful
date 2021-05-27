<?php

namespace App\Providers;

use App\Repositories\CustomerRepositoryInterFace;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Impl\CustomerRepository;
use App\Repositories\Repository;
use App\Services\CustomerServiceInterFace;
use App\Services\Impl\CustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class, EloquentRepository::class);

        $this->app->singleton(CustomerServiceInterFace::class, CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterFace::class, CustomerRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
