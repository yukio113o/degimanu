<?php

namespace App\Usecases;

use Exception;

class Payload
{
    /**
     * @var string
     */
    private $status;

    /**
     * @var array
     */
    private $result;

    /**
     * @var Exception
     */
    private $exception;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Payload
     */
    public function setStatus(string $status): Payload
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $result
     *
     * @return Payload
     */
    public function setResult(array $result): Payload
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Exception
     */
    public function getException(): Exception
    {
        return $this->exception;
    }

    /**
     * @param Exception $exception
     *
     * @return Payload
     */
    public function setException(Exception $exception): Payload
    {
        $this->exception = $exception;

        return $this;
    }
}
