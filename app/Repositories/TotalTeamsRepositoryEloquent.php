<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TotalTeamsRepository;
use App\Entities\TotalTeams;
use App\Validators\TotalTeamsValidator;

/**
 * Class TotalTeamsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TotalTeamsRepositoryEloquent extends BaseRepository implements TotalTeamsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TotalTeams::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TotalTeamsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
