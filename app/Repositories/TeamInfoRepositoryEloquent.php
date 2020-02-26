<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TeamInfoRepository;
use App\Entities\TeamInfo;
use App\Validators\TeamInfoValidator;

/**
 * Class TeamInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TeamInfoRepositoryEloquent extends BaseRepository implements TeamInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TeamInfo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TeamInfoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
