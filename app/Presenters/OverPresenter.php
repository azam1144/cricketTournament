<?php

namespace App\Presenters;

use App\Transformers\OverTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OverPresenter.
 *
 * @package namespace App\Presenters;
 */
class OverPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OverTransformer();
    }
}
