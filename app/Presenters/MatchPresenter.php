<?php

namespace App\Presenters;

use App\Transformers\MatchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MatchPresenter.
 *
 * @package namespace App\Presenters;
 */
class MatchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MatchTransformer();
    }
}
