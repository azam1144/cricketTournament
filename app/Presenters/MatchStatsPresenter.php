<?php

namespace App\Presenters;

use App\Transformers\MatchStatsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MatchStatsPresenter.
 *
 * @package namespace App\Presenters;
 */
class MatchStatsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MatchStatsTransformer();
    }
}
