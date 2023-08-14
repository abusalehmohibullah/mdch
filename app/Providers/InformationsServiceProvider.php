<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Informations;

class InformationsServiceProvider extends ServiceProvider
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
        $informations = Informations::all()->pluck('content', 'slug')->toArray();
        config(['informations' => $informations]);
    }
}
