<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Staduim;

/**
 * Class StaduimTransformer.
 *
 * @package namespace App\Transformers;
 */
class StaduimTransformer extends TransformerAbstract
{
    /**
     * Transform the Staduim entity.
     *
     * @param \App\Entities\Staduim $model
     *
     * @return array
     */
    public function transform(Staduim $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
