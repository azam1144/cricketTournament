<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Batting.
 *
 * @package namespace App\Entities;
 */
class Batting extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['match_id', 'player_id', 'status', 'runs', 'balls', '4s', '6s', 'strike_rate'];

    /**
     * Get the Player that owns Batting.
     */
    public function player()
    {
        return $this->belongsTo('App\Entities\Player');
    }

    /**
     * Get the Match that owns the Batting.
     */
    public function match()
    {
        return $this->belongsTo('App\Entities\Match');
    }
}
