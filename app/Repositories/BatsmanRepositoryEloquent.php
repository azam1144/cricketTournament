<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BatsmanRepository;
use App\Entities\Batsman;
use App\Validators\BatsmanValidator;

/**
 * Class BatsmanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BatsmanRepositoryEloquent extends BaseRepository implements BatsmanRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Batsman::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BatsmanValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
