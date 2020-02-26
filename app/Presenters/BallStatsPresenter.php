<?php

namespace App\Presenters;

use App\Transformers\BallStatsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BallStatsPresenter.
 *
 * @package namespace App\Presenters;
 */
class BallStatsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BallStatsTransformer();
    }
}
