<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Stadium.
 *
 * @package namespace App\Entities;
 */
class Stadium extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'city', 'capacity'];

    /**
     * Get the Match that owns the Stadium.
     */
    public function match()
    {
        return $this->belongsTo('App\Entities\Match');
    }
}
