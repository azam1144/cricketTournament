<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BallStat.
 *
 * @package namespace App\Entities;
 */
class BallStat extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['match_stats_id', 'bowler_id', 'batsman_id', 'ball', 'over', 'stats'];

    /**
     * Get the Player that owen the Ball Stats.
     */
    public function player()
    {
        return $this->belongsTo('App\Entities\Player');
    }

    /**
     * Get the Match Stats that owns the Ball Stats.
     */
    public function matchStats()
    {
        return $this->belongsTo('App\Entities\MatchStat');
    }
}
