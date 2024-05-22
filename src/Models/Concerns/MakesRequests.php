<?php

namespace IBS\Models\Concerns;

use IBS\Transport\Request;
use IBS\Transport\Response;
use Psr\Http\Message\ResponseInterface;

trait MakesRequests
{
    public const MODELS_NAMESPACE = 'IBS\Models\\';

    protected $lastResponse;

    public function makeRequest($method, array $payload): Response
    {
        $request = (new Request())
            ->setAuthentication(
                $this->client->getConfiguration()->getKey('ApiKey'),
                $this->client->getConfiguration()->getKey('Password')
            )
            ->setEndpoint(
                $this->client->getConfiguration()->getKey('Endpoint')
            )
            ->setParameters([
                'ResponseFormat' => $this->client->getConfiguration()->getKey('ResponseFormat')
            ]);

        if ($payload) {
            $request->setParameters($payload);
        }

        $this->setLastResponse($request->execute($method));

        return $this->getLastResponse();
    }

    public function setLastResponse(Response $response): void
    {
        $this->lastResponse = $response;
    }

    public function getLastResponse(): Response
    {
        return $this->lastResponse;
    }

    public static function getRequestMethod(string $method)
    {
        return str_replace(
            [self::MODELS_NAMESPACE, '::'],
            ['', '/'],
            $method
        );
    }
}