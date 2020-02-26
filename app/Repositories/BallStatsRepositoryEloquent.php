<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BallStatsRepository;
use App\Entities\BallStats;
use App\Validators\BallStatsValidator;

/**
 * Class BallStatsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BallStatsRepositoryEloquent extends BaseRepository implements BallStatsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BallStats::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BallStatsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
