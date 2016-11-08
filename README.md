# Laravel Inviteable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-inviteable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    BrianFaust\Inviteable\InviteableServiceProvider::class
];
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

use BrianFaust\Inviteable\HasInvitesTrait;
use BrianFaust\Inviteable\Interfaces\HasInvites;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements HasInvites
{
    use HasInvitesTrait;
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

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

The [The MIT License (MIT)](LICENSE). Please check the [LICENSE](LICENSE) file for more details.
