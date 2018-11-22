<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require base_path() . '/resources/macros/macrosSelect.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
