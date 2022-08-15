<?php

namespace App\Http\Responders\User;

use App\Http\Responders\AbstractResponder;
use App\Usecases\Payload;
use Symfony\Component\HttpFoundation\Response;

class MypageResponder extends AbstractResponder
{
    /**
     * @param mixed ...$args
     *
     * @return Response
     */
    public function handle(...$args) : Response
    {
        [$payload] = $args;

        assert($payload instanceof Payload);

        $user = $payload->getResult()['user'];

        return view('users.mypage', compact('user'));
    }
}
