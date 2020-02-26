<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Over.
 *
 * @package namespace App\Entities;
 */
class Over extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['match_id', 'player_id', 'maiden', 'runs', 'wickets', 'economy', '0s', '4s', '6s', 'no_balls', 'wide_balls'];

    /**
     * Get the Player that owns the Over.
     */
    public function player()
    {
        return $this->belongsTo('App\Entities\Player');
    }

    /**
     * Get the Match that owns the Over.
     */
    public function match()
    {
        return $this->belongsTo('App\Entities\Match');
    }
}
