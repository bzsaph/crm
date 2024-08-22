<?php

namespace App\Providers;
use App\Commentonproject;
use App\Newproject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         return "hello";
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Builder::defaultStringLength(191);
       



    }
}

