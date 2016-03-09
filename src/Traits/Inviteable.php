<?php

/*
 * This file is part of Laravel Inviteable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Inviteable\Traits;

use DraperStudio\Inviteable\Models\Invite;

/**
 * Class Inviteable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
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
