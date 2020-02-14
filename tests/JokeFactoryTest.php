<?php

namespace Camilamilagros\ChuckNorrisJokes\Tests;

use Camilamilagros\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 486, "joke": "Chuck Norris solved the Travelling Salesman problem in O(1) time. Heres the pseudo-code: Break salesman into N pieces. Kick each piece to a different city.", "categories": ["nerdy"] } }'),
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('Chuck Norris solved the Travelling Salesman problem in O(1) time. Heres the pseudo-code: Break salesman into N pieces. Kick each piece to a different city.', $joke);
    }
}
