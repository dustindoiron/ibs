<?php

namespace IBS\Models\Concerns;

use IBS\Transport\Request;
use IBS\Transport\Response;
use IBS\Client;

trait MakesRequests
{
    public const MODELS_NAMESPACE = 'IBS\Models\\';

    protected $lastResponse;

    protected $client;

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function makeRequest($method, array $payload): Response
    {
        $request = (new Request())
            ->setAuthentication(
                $this->getClient()->getConfiguration()->getKey('ApiKey'),
                $this->getClient()->getConfiguration()->getKey('Password')
            )
            ->setEndpoint(
                $this->getClient()->getConfiguration()->getKey('Endpoint')
            )
            ->setParameters([
                'ResponseFormat' => $this->getClient()->getConfiguration()->getKey('ResponseFormat')
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
            [self::MODELS_NAMESPACE, '::', '\\'],
            ['', '/', '/'],
            ucwords($method)
        );
    }
}