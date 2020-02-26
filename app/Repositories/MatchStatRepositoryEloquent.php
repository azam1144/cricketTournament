<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MatchStatRepository;
use App\Entities\MatchStat;
use App\Validators\MatchStatValidator;

/**
 * Class MatchStatRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MatchStatRepositoryEloquent extends BaseRepository implements MatchStatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MatchStat::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MatchStatValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
