<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TeamInfo;

/**
 * Class TeamInfoTransformer.
 *
 * @package namespace App\Transformers;
 */
class TeamInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the TeamInfo entity.
     *
     * @param \App\Entities\TeamInfo $model
     *
     * @return array
     */
    public function transform(TeamInfo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
