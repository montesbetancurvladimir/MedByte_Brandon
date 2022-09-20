<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Para el excel.
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        //Para el Excel.
        Schema::defaultStringLength(191);
    }
}
