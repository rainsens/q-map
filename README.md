<h1 align="center"> QMap </h1>

<p align="center"> A qq map sdk for getting regions of china.</p>


## Installing

```shell
$ composer require rainsens/q-map
```

## Configuration
You have to get the API Key from [QQ Map](https://lbs.qq.com) before use.

## Usage
```php
use Rainsens\QMap\QMap;
$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$map = new QMap($key);
```

## Getting regions
```php
$map->region()->list();
$map->region()->children();
$map->region()->search();
```

## Using in Laravel
Install with the same way and put the API Key in `config/services.php`
```php
    .
    .
    .
     'q_map' => [
        'key' => env('QMAP_API_KEY'),
    ],
```
Then configure the MAP_API_KEY in .env
```php
QMAP_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

```php
QMap::region()->list();
QMap::region()->children();
QMap::region()->search();
```

About arguments above please refer [QQ Map](https://lbs.qq.com/webservice_v1/guide-region.html).

## Reference
[QQ Map](https://lbs.qq.com/webservice_v1/guide-region.html)


## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/rainsens/map/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/rainsens/map/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
