<?php

namespace App\Presenters;

use App\Transformers\WicketStatTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WicketStatPresenter.
 *
 * @package namespace App\Presenters;
 */
class WicketStatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WicketStatTransformer();
    }
}
