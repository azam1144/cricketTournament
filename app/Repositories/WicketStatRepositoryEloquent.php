<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WicketStatRepository;
use App\Entities\WicketStat;
use App\Validators\WicketStatValidator;

/**
 * Class WicketStatRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WicketStatRepositoryEloquent extends BaseRepository implements WicketStatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WicketStat::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WicketStatValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
