<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Over;

/**
 * Class OverTransformer.
 *
 * @package namespace App\Transformers;
 */
class OverTransformer extends TransformerAbstract
{
    /**
     * Transform the Over entity.
     *
     * @param \App\Entities\Over $model
     *
     * @return array
     */
    public function transform(Over $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
