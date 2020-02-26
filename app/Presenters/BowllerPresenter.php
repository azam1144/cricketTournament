<?php

namespace App\Presenters;

use App\Transformers\BowllerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BowllerPresenter.
 *
 * @package namespace App\Presenters;
 */
class BowllerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BowllerTransformer();
    }
}
