<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class WicketStat.
 *
 * @package namespace App\Entities;
 */
class WicketStat extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['match_stats_id', 'runs', 'over', 'wicket'];

    /**
     * Get the Match Stats that owns the Wicket Stats.
     */
    public function matchStats()
    {
        return $this->belongsTo('App\Entities\MatchStat');
    }
}
