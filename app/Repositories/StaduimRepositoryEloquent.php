<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StaduimRepository;
use App\Entities\Staduim;
use App\Validators\StaduimValidator;

/**
 * Class StaduimRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StaduimRepositoryEloquent extends BaseRepository implements StaduimRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Staduim::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StaduimValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
