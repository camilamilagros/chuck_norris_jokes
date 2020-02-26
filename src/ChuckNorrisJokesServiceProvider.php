<?php

namespace Camilamilagros\ChuckNorrisJokes;

use Camilamilagros\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Camilamilagros\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;
use Illuminate\Support\ServiceProvider;
use Route;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../config/chuck-norris.php' => base_path('config/chuck-norris.php'),
        ], 'config');

        if (! class_exists('CreateJokesTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_jokes_table.php.stub' => database_path('migration/'.date('Y_m_d_His', time()).'_create_jokes_table.php'),
            ], 'migrations');
        }

        Route::get(config('chuck-norris.route'), ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }
}
