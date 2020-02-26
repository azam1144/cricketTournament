<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BallStats;

/**
 * Class BallStatsTransformer.
 *
 * @package namespace App\Transformers;
 */
class BallStatsTransformer extends TransformerAbstract
{
    /**
     * Transform the BallStats entity.
     *
     * @param \App\Entities\BallStats $model
     *
     * @return array
     */
    public function transform(BallStats $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
