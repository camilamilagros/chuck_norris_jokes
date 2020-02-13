<?php

namespace Camilamilagros\ChuckNorrisJokes;

class JokeFactory
{
    protected array $jokes = [
        'ble',
        'bli'
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
