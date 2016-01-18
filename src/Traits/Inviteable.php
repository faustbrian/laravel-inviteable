<?php

namespace DraperStudio\Inviteable\Traits;

use DraperStudio\Inviteable\Models\Invite;

trait Inviteable
{
    public function invite()
    {
        return $this->morphOne(Invite::class, 'claimer');
    }
}
