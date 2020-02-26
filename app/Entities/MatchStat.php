<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MatchStat.
 *
 * @package namespace App\Entities;
 */
class MatchStat extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['match_id', 'team_id', 'runs', 'overs', 'wickets'];

    /**
     * Get the Team that have Match Stats.
     */
    public function team()
    {
        return $this->belongsTo('App\Entities\Team');
    }

    /**
     * Get the Match that owns the Match Stats.
     */
    public function match()
    {
        return $this->belongsTo('App\Entities\Match');
    }

    /**
     * Get the Ball Stats for the Match Stats.
     */
    public function ballStats()
    {
        return $this->hasMany('App\Entities\BallStat');
    }

    /**
     * Get the Wicket Stats for the Match Stats.
     */
    public function wicketStats()
    {
        return $this->hasMany('App\Entities\WicketStat');
    }
}
