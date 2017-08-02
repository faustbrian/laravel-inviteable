<?php

/*
 * This file is part of Laravel Inviteable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Inviteable\Traits;

use BrianFaust\Inviteable\Invite;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasInvites
{
    /**
     * @return mixed
     */
    public function invite(): MorphOne
    {
        return $this->morphOne(Invite::class, 'claimer');
    }
}
