<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BallStatRepository;
use App\Entities\BallStat;
use App\Validators\BallStatValidator;

/**
 * Class BallStatRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BallStatRepositoryEloquent extends BaseRepository implements BallStatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BallStat::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BallStatValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
