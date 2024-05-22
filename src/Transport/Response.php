<?php

namespace IBS\Transport;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Stream;

class Response
{
    protected $statusCode = 0;

    protected $body;

    public function __construct(ResponseInterface $original)
    {
        $this->setBody($original->getBody());
        $this->setStatusCode($original->getStatusCode());
    }

    public function setBody(Stream $body)
    {
        $this->body = $body;
    }

    public function setStatusCode(int $code)
    {
        $this->statusCode = $code;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function success(): bool
    {
        return strpos($this->statusCode, 20);
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getBodyAsArray()
    {
        return json_decode($this->getBody(), true);
    }

    public function getBodyAsObject()
    {
        return json_decode($this->getBody());
    }
}