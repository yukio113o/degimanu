<?php

namespace App\Usecases\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Usecases\Payload;

class ShowUsecase extends Controller
{
    /**
     * @param Product $product
     * @return Payload
     */
    public function run(Product $product): Payload
    {
        $payload = new Payload();

        $reviews = $product->reviews()->get();

        return $payload->setResult([
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}
