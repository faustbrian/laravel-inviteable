# Laravel Inviteable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-inviteable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Inviteable\ServiceProvider::class
];
```

At last you need to publish and run the migration.

```
php artisan vendor:publish --provider="DraperStudio\Inviteable\ServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php

/*
 * This file is part of Laravel Inviteable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use DraperStudio\Inviteable\Contracts\Inviteable;
use DraperStudio\Inviteable\Traits\Inviteable as InviteableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Inviteable
{
    use InviteableTrait;
}
```

## Examples

#### Generate a new invitation code
``` php
Invite::getNewCode([
    'email' => 'test@test.io',
]);
```

#### Find an invitation by code
``` php
Invite::getInviteByCode($invite->code);
```

#### Find a valid invitation by code
``` php
Invite::getValidInviteByCode($invite->code);
```

#### Claim an invitation
``` php
$invite->claim($user);
```

#### Check if an invitiation has already been claimed
``` php
if ($invite->claimed()) {
    dd('This invite has already been claimed.');
}
```

#### Access the model that claimed the invite
``` php
dump($invite->claimer);
```

#### Access the invite that has been claimed by a model
``` php
dump($user->invite);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-inviteable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Inviteable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-inviteable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-inviteable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-inviteable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-inviteable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Inviteable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-inviteable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-inviteable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-inviteable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
