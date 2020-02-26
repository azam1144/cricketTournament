<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BowllerRepository;
use App\Entities\Bowller;
use App\Validators\BowllerValidator;

/**
 * Class BowllerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BowllerRepositoryEloquent extends BaseRepository implements BowllerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bowller::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BowllerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
