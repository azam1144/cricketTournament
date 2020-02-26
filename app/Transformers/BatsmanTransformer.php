<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Batsman;

/**
 * Class BatsmanTransformer.
 *
 * @package namespace App\Transformers;
 */
class BatsmanTransformer extends TransformerAbstract
{
    /**
     * Transform the Batsman entity.
     *
     * @param \App\Entities\Batsman $model
     *
     * @return array
     */
    public function transform(Batsman $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
