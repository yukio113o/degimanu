<?php

namespace App\Http\Responders;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Routing\UrlGenerator;

abstract class AbstractResponder implements ResponderInterface
{
    /**
     * @var ResponseFactory
     */
    protected $response;

    /**
     * @var UrlGenerator
     */
    protected $generator;

    /**
     * AbstractResponder constructor.
     *
     * @param ResponseFactory $response
     * @param UrlGenerator    $generator
     */
    public function __construct(ResponseFactory $response, UrlGenerator $generator)
    {
        $this->response = $response;
        $this->generator = $generator;
    }
}
