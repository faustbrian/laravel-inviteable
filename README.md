# Laravel Inviteable

[![Build Status](https://img.shields.io/travis/artisanry/Inviteable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Inviteable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/inviteable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Inviteable.svg?style=flat-square)](https://github.com/artisanry/Inviteable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Inviteable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Inviteable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/inviteable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Artisanry\Inviteable\InviteableServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php

namespace App;

use Artisanry\Inviteable\HasInvites;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasInvites;
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

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
