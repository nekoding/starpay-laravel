# StarpayLaravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require nekoding/starpay-laravel
```

## Usage

```php
use Nekoding\StarpayLaravel\StarpayLaravel;

# required parameters : sendid, money
# optional parameters : email, sendpoint, username
$parameters = array(
    "email"     => "johndoe@mail.com",
    "sendid"    => "xxxx",
    "sendpoint" => "xxxx",
    "money"     => 100,
    "username"  => "xxxx"
);

# PC version : it will redirect to star-pay page PC version
StarpayLaravel::build($parameters)->send();

# Mobile version : it will redirect to star-pay page Mobile version
StarpayLaravel::build($parameters)->mobile()->send();
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email enggartivandi@outlook.com instead of using the issue tracker.

## Credits

- [nekoding][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/nekoding/starpay-laravel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/nekoding/starpay-laravel.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nekoding/starpay-laravel/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/nekoding/starpay-laravel
[link-downloads]: https://packagist.org/packages/nekoding/starpay-laravel
[link-travis]: https://travis-ci.org/nekoding/starpay-laravel
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/nekoding
[link-contributors]: ../../contributors
