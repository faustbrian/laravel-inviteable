# Laravel Inviteable

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-inviteable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\Inviteable\ServiceProvider::class
];
```

At last you need to publish and run the migration.

```
php artisan vendor:publish --provider="DraperStudio\Inviteable\ServiceProvider" && php artisan migrate
```

## Setup a Model

```php
<?php

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
```php
Invite::getNewCode([
    'email' => 'test@test.io',
]);
```

#### Find an invitation by code
```php
Invite::getInviteByCode($invite->code);
```

#### Find a valid invitation by code
```php
Invite::getValidInviteByCode($invite->code);
```

#### Claim an invitation
```php
$invite->claim($user);
```

#### Check if an invitiation has already been claimed
```php
if ($invite->claimed()) {
    dd('This invite has already been claimed.');
}
```

#### Access the model that claimed the invite
```php
dump($invite->claimer);
```

#### Access the invite that has been claimed by a model
```php
dump($user->invite);
```
