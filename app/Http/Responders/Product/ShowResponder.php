<?php

namespace App\Http\Responders\Product;

use App\Http\Responders\AbstractResponder;
use App\Usecases\Payload;
use Symfony\Component\HttpFoundation\Response;

class ShowResponder extends AbstractResponder
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

        $product = $payload->getResult()['product'];
        $reviews = $payload->getResult()['reviews'];

        return $this->response->view('products.show', compact('product', 'reviews'));
    }
}
