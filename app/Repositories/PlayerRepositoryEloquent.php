<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PlayerRepository;
use App\Entities\Player;
use App\Validators\PlayerValidator;

/**
 * Class PlayerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PlayerRepositoryEloquent extends BaseRepository implements PlayerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Player::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PlayerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
