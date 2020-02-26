<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MatchStat;

/**
 * Class MatchStatTransformer.
 *
 * @package namespace App\Transformers;
 */
class MatchStatTransformer extends TransformerAbstract
{
    /**
     * Transform the MatchStat entity.
     *
     * @param \App\Entities\MatchStat $model
     *
     * @return array
     */
    public function transform(MatchStat $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
