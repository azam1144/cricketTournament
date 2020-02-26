<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Team.
 *
 * @package namespace App\Entities;
 */
class Team extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
    protected $fillable = ['series_id', 'name', 'code', 'matches', 'won', 'lost', 'points', 'net_run_rate'];

    /**
     * The Match that belong to the Player.
     */
    public function match()
    {
        return $this->belongsToMany('App\Entities\Match');
    }

    /**
     * Get the Series that owns the Team.
     */
    public function series()
    {
        return $this->belongsTo('App\Entities\Series');
    }

    /**
     * Get the Player for a Team.
     */
    public function player()
    {
        return $this->hasMany('App\Entities\Player');
    }

    /**
     * Get the Match Stats for the Team.
     */
    public function matchStats()
    {
        return $this->hasMany('App\Entities\MatchStat');
    }
}
