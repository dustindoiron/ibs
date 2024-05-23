<?php

namespace IBS\Models\Domain;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Concerns\ManagesDomains;
use IBS\Transport\Response;
use IBS\Models\Domain as DomainBase;

class EmailForward
{
    use ManagesDomains;
    use MakesRequests;

    public function __construct(DomainBase $domain)
    {
        $this->setDomain($domain->getDomain());
        $this->setClient($domain->getClient());
    }

    public function add(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function update(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function remove(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function list(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }
}