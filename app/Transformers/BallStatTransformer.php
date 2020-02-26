<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BallStat;

/**
 * Class BallStatTransformer.
 *
 * @package namespace App\Transformers;
 */
class BallStatTransformer extends TransformerAbstract
{
    /**
     * Transform the BallStat entity.
     *
     * @param \App\Entities\BallStat $model
     *
     * @return array
     */
    public function transform(BallStat $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
