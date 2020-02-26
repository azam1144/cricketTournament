<?php

namespace App\Presenters;

use App\Transformers\BatsmanTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BatsmanPresenter.
 *
 * @package namespace App\Presenters;
 */
class BatsmanPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BatsmanTransformer();
    }
}
