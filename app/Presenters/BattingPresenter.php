<?php

namespace App\Presenters;

use App\Transformers\BattingTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BattingPresenter.
 *
 * @package namespace App\Presenters;
 */
class BattingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BattingTransformer();
    }
}
