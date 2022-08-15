<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\User\MypageResponder;
use App\Usecases\User\MypageUsecase;
use Symfony\Component\HttpFoundation\Response;

class MypageAction extends Controller
{
    /**
     * @var MypageUsecase
     */
    private $usecase;

    /**
     * @var MypageResponder
     */
    private $responder;

    /**
     * MypageAction constructor.
     *
     * @param MypageUsecase $usecase
     * @param MypageResponder $responder
     */
    public function __construct(MypageUsecase $usecase, MypageResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function __invoke(): Response
    {
        return $this->responder->handle($this->usecase->run());
    }
}
