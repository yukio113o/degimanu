<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Product\ShowResponder;
use App\Product;
use App\Usecases\Product\ShowUsecase;
use Symfony\Component\HttpFoundation\Response;

class MypageAction extends Controller
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
     * @param Product $user
     * @return Response
     * @throws \Exception
     */
    public function __invoke(User $user): Response
    {
        return $this->responder->handle($this->usecase->run($user));
    }
}
