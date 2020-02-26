<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Bowller;

/**
 * Class BowllerTransformer.
 *
 * @package namespace App\Transformers;
 */
class BowllerTransformer extends TransformerAbstract
{
    /**
     * Transform the Bowller entity.
     *
     * @param \App\Entities\Bowller $model
     *
     * @return array
     */
    public function transform(Bowller $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
