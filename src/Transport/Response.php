<?php

namespace IBS\Transport;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Stream;

class Response
{
    protected $statusCode = 0;

    protected $body;

    protected $original;

    public function __construct(ResponseInterface $original)
    {
        $this->setOriginal($original);
        $this->setBody($original->getBody());
        $this->setStatusCode($original->getStatusCode());
    }

    public function setOriginal(ResponseInterface $original): void
    {
        $this->original = $original;
    }

    public function getOriginal(): ResponseInterface
    {
        return $this->original;
    }

    public function setBody(Stream $body): void
    {
        $this->body = $body;
    }

    public function setStatusCode(int $code): void
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

    public function getBody(): Stream
    {
        return $this->body;
    }

    public function getBodyAsArray(): array
    {
        return json_decode($this->getBody(), true);
    }

    public function getBodyAsObject(): object
    {
        return json_decode($this->getBody());
    }
}