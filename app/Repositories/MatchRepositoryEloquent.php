<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MatchRepository;
use App\Entities\Match;
use App\Validators\MatchValidator;

/**
 * Class MatchRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MatchRepositoryEloquent extends BaseRepository implements MatchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Match::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MatchValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
