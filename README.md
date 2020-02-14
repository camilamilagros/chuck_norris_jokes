# Chuck Norris Jokes

Create random Chuck Norris jokes.

## Installation

Require the package using composer:

```bash
composer require camilamilagros/chuck_norris_jokes
```

## Usage

```php
use Camilamilagros\ChuckNorrisJokes\JokeFactory;

$jokes = new JokeFactory();

$joke = $jokes->getRandomJoke();

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
