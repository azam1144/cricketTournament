<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PlayerRoleRepository;
use App\Entities\PlayerRole;
use App\Validators\PlayerRoleValidator;

/**
 * Class PlayerRoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PlayerRoleRepositoryEloquent extends BaseRepository implements PlayerRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PlayerRole::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PlayerRoleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
