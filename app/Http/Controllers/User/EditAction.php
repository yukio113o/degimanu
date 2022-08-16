<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\User\EditResponder;
use App\User;
use App\Usecases\User\EditUsecase;
use Symfony\Component\HttpFoundation\Response;

class EditAction extends Controller
{
    /**
     * @var EditUsecase
     */
    private $usecase;

    /**
     * @var EditResponder
     */
    private $responder;

    /**
     * EditAction constructor.
     *
     * @param EditUsecase $usecase
     * @param EditResponder $responder
     */
    public function __construct(EditUsecase $usecase, EditResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    /**
     * @param User $user
     * @return Response
     * @throws \Exception
     */
    public function __invoke(User $user): Response
    {
        return $this->responder->handle($this->usecase->run($user));
    }
}
