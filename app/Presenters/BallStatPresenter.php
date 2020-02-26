<?php

namespace App\Presenters;

use App\Transformers\BallStatTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BallStatPresenter.
 *
 * @package namespace App\Presenters;
 */
class BallStatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BallStatTransformer();
    }
}
