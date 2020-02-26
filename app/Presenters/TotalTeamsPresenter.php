<?php

namespace App\Presenters;

use App\Transformers\TotalTeamsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TotalTeamsPresenter.
 *
 * @package namespace App\Presenters;
 */
class TotalTeamsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TotalTeamsTransformer();
    }
}
