<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MatchStats;

/**
 * Class MatchStatsTransformer.
 *
 * @package namespace App\Transformers;
 */
class MatchStatsTransformer extends TransformerAbstract
{
    /**
     * Transform the MatchStats entity.
     *
     * @param \App\Entities\MatchStats $model
     *
     * @return array
     */
    public function transform(MatchStats $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
