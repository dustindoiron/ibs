<?php

namespace IBS\Models\Domain;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Concerns\ManagesDomains;
use IBS\Transport\Response;
use IBS\Models\Domain as DomainBase;

class Transfer
{
    use ManagesDomains;
    use MakesRequests;

    public function __construct(DomainBase $domain)
    {
        $this->setDomain($domain->getDomain());
        $this->setClient($domain->getClient());
    }

    public function initiate(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function retry(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function cancel(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function resendAuthEmail(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function history(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }
}