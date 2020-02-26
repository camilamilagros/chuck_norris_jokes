<?php

namespace Camilamilagros\ChuckNorrisJokes\Http\Controllers;

use Camilamilagros\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Routing\Controller;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorris::getRandomJoke()
        ]);
    }
}
