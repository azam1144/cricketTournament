<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StadiumRepository;
use App\Entities\Stadium;
use App\Validators\StadiumValidator;

/**
 * Class StadiumRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StadiumRepositoryEloquent extends BaseRepository implements StadiumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Stadium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StadiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
