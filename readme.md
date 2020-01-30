# ReactAuth

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require hyungjune/reactauth
```

## Usage
1. config/auth.php의 api driver를 passport로 수정

``` bash
'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
```

2. migrate
``` bash
$ php artisan migrate
```

3. passport key generate
``` bash
$ php artisan passport:install
```

4. .env 파일에 email 세팅
``` bash
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your's
MAIL_PASSWORD=your's
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your's
MAIL_FROM_NAME="${APP_NAME}"
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/hyungjune/reactauth.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hyungjune/reactauth.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/hyungjune/reactauth/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/hyungjune/reactauth
[link-downloads]: https://packagist.org/packages/hyungjune/reactauth
[link-travis]: https://travis-ci.org/hyungjune/reactauth
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/hyungjune
[link-contributors]: ../../contributors
