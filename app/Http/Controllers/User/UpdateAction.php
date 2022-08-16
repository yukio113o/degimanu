<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\User\UpdateResponder;
use App\User;
use App\Usecases\User\UpdateUsecase;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateAction extends Controller
{
    /**
     * @var UpdateUsecase
     */
    private $usecase;

    /**
     * @var UpdateResponder
     */
    private $responder;

    /**
     * UpdateAction constructor.
     *
     * @param UpdateUsecase $usecase
     * @param UpdateResponder $responder
     */
    public function __construct(UpdateUsecase $usecase, UpdateResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function __invoke(Request $request, User $user): Response
    {
        return $this->responder->handle($this->usecase->run($request, $user));
    }
}

