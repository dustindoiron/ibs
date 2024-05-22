<?php

namespace IBS\Models\Concerns;

use IBS\Transport\Request;
use Psr\Http\Message\ResponseInterface;

trait MakesRequests
{
    public function makeRequest($method, array $payload): ResponseInterface
    {
        $request = (new Request())
            ->setAuthentication(
                $this->client->getConfiguration()->getKey('apiKey'), 
                $this->client->getConfiguration()->getKey('password')
            )
            ->setEndpoint($this->client->getConfiguration()->getKey('endpoint'))
            ->setParameters($this->client->getConfiguration()->getKey('ResponseFormat'));

        if ($payload) {
            $request->setParameters($payload);
        }

        $this->setLastResponse($request->execute($method));

        return $this->getLastResponse();
    }

    public function setLastResponse(ResponseInterface $response): void
    {
        $this->lastResponse = $response;
    }

    public function getLastResponse(): ResponseInterface
    {
        return $this->lastResponse;
    }

    public static function getRequestMethod(string $method)
    {
        return ucwords(get_called_class()) . '/' . ucwords($method);
    }
}