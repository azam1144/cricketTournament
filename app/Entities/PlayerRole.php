<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PlayerRole.
 *
 * @package namespace App\Entities;
 */
class PlayerRole extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['player_id', 'batsman', 'bowler'];

    /**
     * Get the Player that owns the Role.
     */
    public function player()
    {
        return $this->belongsTo('App\Entities\Player');
    }
}
