<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MatchStatsRepository;
use App\Entities\MatchStats;
use App\Validators\MatchStatsValidator;

/**
 * Class MatchStatsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MatchStatsRepositoryEloquent extends BaseRepository implements MatchStatsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MatchStats::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MatchStatsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
