<?php

namespace App\Providers;

use App\Interfaces\CurServiceInterface;
use App\Services\AnotherCurSrevice;
use Illuminate\Support\ServiceProvider;

class DiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        dump('register');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CurServiceInterface::class, AnotherCurSrevice::class);
//        $this->app->singleton(CurServiceInterface::class, new AnotherCurSrevice());
    }
}
