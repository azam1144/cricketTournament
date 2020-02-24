<?php

namespace App\Presenters;

use App\Transformers\StaduimTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StaduimPresenter.
 *
 * @package namespace App\Presenters;
 */
class StaduimPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StaduimTransformer();
    }
}
