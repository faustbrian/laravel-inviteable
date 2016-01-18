<?php

namespace DraperStudio\Inviteable\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = ['claimed_at'];

    public function claimer()
    {
        return $this->morphTo();
    }

    public function claim(Model $claimer)
    {
        $this->claimer()->associate($claimer);
        $this->claimed_at = Carbon::now();
        $this->save();

        return $claimer;
    }

    public function claimed()
    {
        return !empty($this->claimed_at);
    }

    public static function getNewCode($data)
    {
        $data['code'] = bin2hex(openssl_random_pseudo_bytes(16));

        return static::create($data);
    }

    public static function getInviteByCode($code)
    {
        return static::where('code', '=', $code)->first();
    }

    public static function getValidInviteByCode($code)
    {
        return static::where('code', '=', $code)
                    ->where('claimed_at', '=', null)
                    ->first();
    }
}
