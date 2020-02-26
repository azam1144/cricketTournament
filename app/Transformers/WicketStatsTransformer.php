<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\WicketStats;

/**
 * Class WicketStatsTransformer.
 *
 * @package namespace App\Transformers;
 */
class WicketStatsTransformer extends TransformerAbstract
{
    /**
     * Transform the WicketStats entity.
     *
     * @param \App\Entities\WicketStats $model
     *
     * @return array
     */
    public function transform(WicketStats $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
