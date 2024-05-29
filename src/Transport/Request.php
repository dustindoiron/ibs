<?php

namespace IBS\Transport;

use GuzzleHttp\Client;
use IBS\Configuration;
use IBS\Transport\Response;
use InvalidArgumentException;

class Request
{
    private string $apiKey;
    private string $password;
    private string $endpoint;
    private array $parameters = [];

    public function setAuthentication(string $apiKey, string $password): Request
    {
        $this->apiKey = $apiKey;
        $this->password = $password;
        return $this;
    }

    public function setEndpoint(string $endpoint = Configuration::IBS_PRODUCTION_ENDPOINT_DEFAULT): Request
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function setParameters(array $parameters): Request
    {
        $this->parameters = array_merge($this->parameters, $parameters);
        return $this;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    protected function getAuthenticationAsArray(): array
    {
        if (! $this->apiKey || ! $this->password) {
            throw new InvalidArgumentException('Authentication is not set before attempting a Request.');
        }

        return [
            'ApiKey' => $this->apiKey,
            'Password' => $this->password,
        ];
    }

    protected function getEndpoint(): string
    {
        if (! $this->endpoint) {
            throw new InvalidArgumentException('Endpoint is not set before attempting a Request.');
        }

        return $this->endpoint;
    }

    public function execute(string $method): Response
    {
        return new Response($this->getHttpClient()->request('POST', $method, [
            'query' => array_merge(
                $this->getParameters(),
                $this->getAuthenticationAsArray()
            )
        ]));
    }

    public function getHttpClient(): Client
    {
        return new Client([
            'base_uri' => $this->getEndpoint(),
        ]);
    }
}