<?php

namespace Camilamilagros\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use Camilamilagros\ChuckNorrisJokes\Facades\ChuckNorris;
use Camilamilagros\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Camilamilagros\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Illuminate\Support\Facades\Artisan;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorris::class
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();
        $this->assertEquals('some joke' . PHP_EOL, $output);
    }
}
