<?php



declare(strict_types=1);

namespace BrianFaust\Inviteable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
    public function claimer(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param Model $claimer
     *
     * @return Model
     */
    public function claim(Model $claimer): bool
    {
        $this->claimer()->associate($claimer);
        $this->claimed_at = Carbon::now();

        return (bool) $this->save();
    }

    /**
     * @return bool
     */
    public function claimed(): bool
    {
        return !empty($this->claimed_at);
    }

    /**
     * @param $data
     *
     * @return static
     */
    public static function getNewCode($data): self
    {
        $data['code'] = bin2hex(openssl_random_pseudo_bytes(16));

        return static::create($data);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public static function getInviteByCode($code): self
    {
        return static::where('code', '=', $code)->first();
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public static function getValidInviteByCode($code): self
    {
        return static::where('code', '=', $code)
                    ->where('claimed_at', '=', null)
                    ->first();
    }
}
