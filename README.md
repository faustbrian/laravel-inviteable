# Laravel Inviteable

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Inviteable/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Inviteable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-inviteable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Inviteable.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Inviteable/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Inviteable.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Inviteable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-inviteable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="BrianFaust\Inviteable\InviteableServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php

namespace App;

use BrianFaust\Inviteable\HasInvites;
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

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
