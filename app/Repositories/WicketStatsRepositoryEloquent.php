<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WicketStatsRepository;
use App\Entities\WicketStats;
use App\Validators\WicketStatsValidator;

/**
 * Class WicketStatsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WicketStatsRepositoryEloquent extends BaseRepository implements WicketStatsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WicketStats::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WicketStatsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
