<?php

namespace App\Http\Responders\User;

use App\Http\Responders\AbstractResponder;
use App\Usecases\Payload;
use Symfony\Component\HttpFoundation\Response;

class UpdateResponder extends AbstractResponder
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

        return redirect()->route('mypage');
    }
}
