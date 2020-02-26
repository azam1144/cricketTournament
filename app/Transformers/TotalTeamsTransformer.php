<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TotalTeams;

/**
 * Class TotalTeamsTransformer.
 *
 * @package namespace App\Transformers;
 */
class TotalTeamsTransformer extends TransformerAbstract
{
    /**
     * Transform the TotalTeams entity.
     *
     * @param \App\Entities\TotalTeams $model
     *
     * @return array
     */
    public function transform(TotalTeams $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
