<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PlayerRole;

/**
 * Class PlayerRoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class PlayerRoleTransformer extends TransformerAbstract
{
    /**
     * Transform the PlayerRole entity.
     *
     * @param \App\Entities\PlayerRole $model
     *
     * @return array
     */
    public function transform(PlayerRole $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
