<?php

namespace Mamoun2020\Bop;

use Illuminate\Support\ServiceProvider;

class BopServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/config/bop.php', 'bop'
        );
        $this->publishes([
            __DIR__.'/config/bop.php' => config_path('bop.php'),
        ]);
    }

    public function register()
    {

    }
}
