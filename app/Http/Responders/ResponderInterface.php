<?php

namespace App\Http\Responders;

use Symfony\Component\HttpFoundation\Response;

interface ResponderInterface
{
    /**
     * @param mixed ...$args
     *
     * @return Response
     */
    public function handle(...$args): Response;
}
