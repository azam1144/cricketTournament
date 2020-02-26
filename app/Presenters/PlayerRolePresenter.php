<?php

namespace App\Presenters;

use App\Transformers\PlayerRoleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlayerRolePresenter.
 *
 * @package namespace App\Presenters;
 */
class PlayerRolePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PlayerRoleTransformer();
    }
}
