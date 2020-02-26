<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Stadium;

/**
 * Class StadiumTransformer.
 *
 * @package namespace App\Transformers;
 */
class StadiumTransformer extends TransformerAbstract
{
    /**
     * Transform the Stadium entity.
     *
     * @param \App\Entities\Stadium $model
     *
     * @return array
     */
    public function transform(Stadium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
