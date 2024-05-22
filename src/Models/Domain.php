<?php

namespace IBS\Models;

use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
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
        } else {
            throw new InvalidArgumentException('Domain must be provided when accessing Domain model.');
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

    public function check(): ResponseInterface
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain', $this->getDomain()]
        );
    }
}