<?php

namespace IBS\Models;

use IBS\Transport\Response;
use IBS\Models\Concerns\MakesRequests;
use IBS\Client;

class Domain
{
    use MakesRequests;

    protected $client;

    protected $domain;

    public function __construct(Client $client, string $domain = '')
    {
        if ($domain) {
            $this->setDomain($domain);
        }

        $this->client = $client;
    }

    public function setDomain(string $domain)
    {
        $this->domain = $domain;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function check(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function create(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function update(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function info(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function registryStatus(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function trade(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function push(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function list(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            $parameters
        );
    }

    public function count(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            []
        );
    }

    public function renew(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function restore(array $parameters): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }
}