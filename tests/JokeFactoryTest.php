<?php

namespace Camilamilagros\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Camilamilagros\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory(['This is a joke']);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $predefinedJokes = [
            'ble',
            'bli'
        ];
        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $predefinedJokes);
    }
}
