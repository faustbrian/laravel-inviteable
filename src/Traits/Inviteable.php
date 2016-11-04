<?php

namespace BrianFaust\Inviteable\Traits;

use BrianFaust\Inviteable\Models\Invite;

trait Inviteable
{
    /**
     * @return mixed
     */
    public function invite()
    {
        return $this->morphOne(Invite::class, 'claimer');
    }
}
