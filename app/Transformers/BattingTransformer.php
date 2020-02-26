<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Batting;

/**
 * Class BattingTransformer.
 *
 * @package namespace App\Transformers;
 */
class BattingTransformer extends TransformerAbstract
{
    /**
     * Transform the Batting entity.
     *
     * @param \App\Entities\Batting $model
     *
     * @return array
     */
    public function transform(Batting $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
