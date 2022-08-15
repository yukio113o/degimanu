<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Responders\Product\ShowResponder;
use App\Product;
use App\Usecases\Product\ShowUsecase;
use Symfony\Component\HttpFoundation\Response;

class ShowAction extends Controller
{
    /**
     * @var ShowUsecase
     */
    private $usecase;

    /**
     * @var ShowResponder
     */
    private $responder;

    /**
     * ShowAction constructor.
     *
     * @param ShowUsecase $usecase
     * @param ShowResponder $responder
     */
    public function __construct(ShowUsecase $usecase, ShowResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    /**
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function __invoke(Product $product): Response
    {
        return $this->responder->handle($this->usecase->run($product));
    }
}

