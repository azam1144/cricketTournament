<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Series.
 *
 * @package namespace App\Entities;
 */
class Series extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'sessions'];

    /**
     * Get the Team for the Series.
     */
    public function teams()
    {
        return $this->hasMany('App\Entities\Team');
    }
}
