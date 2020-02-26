<?php

namespace App\Presenters;

use App\Transformers\MatchStatTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MatchStatPresenter.
 *
 * @package namespace App\Presenters;
 */
class MatchStatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MatchStatTransformer();
    }
}
