<?php

namespace App\Presenters;

use App\Transformers\StadiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StadiumPresenter.
 *
 * @package namespace App\Presenters;
 */
class StadiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StadiumTransformer();
    }
}
