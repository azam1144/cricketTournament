<?php

namespace App\Presenters;

use App\Transformers\WicketStatsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WicketStatsPresenter.
 *
 * @package namespace App\Presenters;
 */
class WicketStatsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WicketStatsTransformer();
    }
}
