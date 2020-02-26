<?php

namespace App\Presenters;

use App\Transformers\TeamInfoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TeamInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class TeamInfoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TeamInfoTransformer();
    }
}
