<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\WicketStat;

/**
 * Class WicketStatTransformer.
 *
 * @package namespace App\Transformers;
 */
class WicketStatTransformer extends TransformerAbstract
{
    /**
     * Transform the WicketStat entity.
     *
     * @param \App\Entities\WicketStat $model
     *
     * @return array
     */
    public function transform(WicketStat $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
