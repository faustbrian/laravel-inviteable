<?php

namespace BrianFaust\Inviteable\Traits;

use BrianFaust\Inviteable\Invite;

trait HasInvitesTrait
{
    /**
     * @return mixed
     */
    public function invite()
    {
        return $this->morphOne(Invite::class, 'claimer');
    }
}
