<?php

namespace App\Http\Responders\User;

use App\Http\Responders\AbstractResponder;
use App\Usecases\Payload;
use Symfony\Component\HttpFoundation\Response;

class EditResponder extends AbstractResponder
{
    /**
     * @param mixed ...$args
     *
     * @return Response
     */
    public function handle(...$args): Response
    {
        [$payload] = $args;

        assert($payload instanceof Payload);

        $user = $payload->getResult()['user'];

        return $this->response->view('users.edit', compact('user'));
    }
}
