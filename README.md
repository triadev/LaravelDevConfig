# LaravelDevConfig

[![Software license][ico-license]](LICENSE)
[![Latest stable][ico-version-stable]][link-packagist]
[![Latest development][ico-version-dev]][link-packagist]
[![Monthly installs][ico-downloads-monthly]][link-downloads]

A service provider for laravel to managing the dev config.

## Main features
- Providers by environment
- Aliases by environment

## Installation

### Composer
> composer require triadev/laravel-dev-config

### Application
Register the service provider in the config/app.php (Laravel).
```
'providers' => [
    \Triadev\LaravelDevConfig\Provider\LaravelDevConfigServiceProvider::class
]
```

Once installed you can now publish your config file and set your correct configuration for using the package.
```php
php artisan vendor:publish --provider="\Triadev\LaravelDevConfig\Provider\LaravelDevConfigServiceProvider" --tag="config"
```

This will create a file ```config/triadev-dev-config.php```.

## Configuration
| Key        | Value           | Description  |
|:-------------:|:-------------:|:-----:|
| environments | ARRAY | Enviroments (local, testing, ...) |
| providers | ARRAY | Providers |
| providers.* | STRING | Example: IdeHelperServiceProvider::class |
| aliases | ARRAY | Aliases |
| aliases.* | KEY => VALUE | Alias => Facade-Class ('Debugbar' => Facade::class) |

## Reporting Issues
If you do find an issue, please feel free to report it with GitHub's bug tracker for this project.

Alternatively, fork the project and make a pull request. :)

## Other

### Project related links
- [Wiki](https://github.com/triadev/LaravelDevConfig/wiki)
- [Issue tracker](https://github.com/triadev/LaravelDevConfig/issues)

### Author
- [Christopher Lorke](mailto:christopher.lorke@gmx.de)

### License
The code for LaravelDevConfig is distributed under the terms of the MIT license (see [LICENSE](LICENSE)).

[ico-license]: https://img.shields.io/github/license/triadev/LaravelDevConfig.svg?style=flat-square
[ico-version-stable]: https://img.shields.io/packagist/v/triadev/laravel-dev-config.svg?style=flat-square
[ico-version-dev]: https://img.shields.io/packagist/vpre/triadev/laravel-dev-config.svg?style=flat-square
[ico-downloads-monthly]: https://img.shields.io/packagist/dm/triadev/laravel-dev-config.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/triadev/laravel-dev-confi
[link-downloads]: https://packagist.org/packages/triadev/laravel-dev-confi/stats
