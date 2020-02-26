<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Match;

/**
 * Class MatchTransformer.
 *
 * @package namespace App\Transformers;
 */
class MatchTransformer extends TransformerAbstract
{
    /**
     * Transform the Match entity.
     *
     * @param \App\Entities\Match $model
     *
     * @return array
     */
    public function transform(Match $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
