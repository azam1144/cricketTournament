<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Match.
 *
 * @package namespace App\Entities;
 */
class Match extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'stadium_id', 'toss_winner', 'bat_first', 'match_player', 'winner', 'description'];

    /**
     * The Player that belong to the Match.
     */
    public function players()
    {
        return $this->belongsToMany('App\Entities\Player');
    }

    /**
     * The Player that belong to the Match.
     */
    public function teams()
    {
        return $this->belongsToMany('App\Entities\Team');
    }

    /**
     * Get the Stadium for the Match.
     */
    public function stadium()
    {
        return $this->hasMany('App\Entities\Stadium');
    }

    /**
     * Get the Over for the Match.
     */
    public function over()
    {
        return $this->hasMany('App\Entities\Over');
    }

    /**
     * Get the Batting for the Match.
     */
    public function batting()
    {
        return $this->hasMany('App\Entities\Batting');
    }

    /**
     * Get the matchStats for the Match.
     */
    public function matchStats()
    {
        return $this->hasMany('App\Entities\MatchStat');
    }
}
