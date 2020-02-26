<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Player.
 *
 * @package namespace App\Entities;
 */
class Player extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['team_id', 'name', 'age', 'total_matches', 'strike_rate', 'wicket_keeper', 'captain'];

    /**
 * The Match that belong to the Player.
 */
    public function match()
    {
        return $this->belongsToMany('App\Entities\Match');
    }

    /**
     * Get the Player Roles for a Player.
     */
    public function roles()
    {
        return $this->hasMany('App\Entities\PlayerRole');
    }

    /**
     * Get the Team that belongs to Player.
     */
    public function team()
    {
        return $this->belongsTo('App\Entities\Team');
    }

    /**
     * Get the Over for the Player.
     */
    public function over()
    {
        return $this->hasMany('App\Entities\Over');
    }

    /**
     * Get the Batting for a Player.
     */
    public function batting()
    {
        return $this->hasMany('App\Entities\Batting');
    }

    /**
     * Get the Ball Stats for the Player.
     */
    public function ballStats()
    {
        return $this->hasMany('App\Entities\BallStat');
    }
}
