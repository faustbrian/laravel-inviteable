<?php

/*
 * This file is part of Laravel Inviteable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Inviteable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $dates = ['claimed_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function claimer()
    {
        return $this->morphTo();
    }

    /**
     * @param Model $claimer
     *
     * @return Model
     */
    public function claim(Model $claimer)
    {
        $this->claimer()->associate($claimer);
        $this->claimed_at = Carbon::now();
        $this->save();

        return $claimer;
    }

    /**
     * @return bool
     */
    public function claimed()
    {
        return !empty($this->claimed_at);
    }

    /**
     * @param $data
     *
     * @return static
     */
    public static function getNewCode($data)
    {
        $data['code'] = bin2hex(openssl_random_pseudo_bytes(16));

        return static::create($data);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public static function getInviteByCode($code)
    {
        return static::where('code', '=', $code)->first();
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public static function getValidInviteByCode($code)
    {
        return static::where('code', '=', $code)
                    ->where('claimed_at', '=', null)
                    ->first();
    }
}
