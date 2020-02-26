<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Player;

/**
 * Class PlayerTransformer.
 *
 * @package namespace App\Transformers;
 */
class PlayerTransformer extends TransformerAbstract
{
    /**
     * Transform the Player entity.
     *
     * @param \App\Entities\Player $model
     *
     * @return array
     */
    public function transform(Player $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
