<?php



declare(strict_types=1);

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
