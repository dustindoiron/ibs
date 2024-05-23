<?php

namespace IBS\Models\Domain;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Concerns\ManagesDomains;
use IBS\Transport\Response;
use IBS\Models\Domain as DomainBase;

class TransferAway
{
    use ManagesDomains;
    use MakesRequests;

    public function __construct(DomainBase $domain)
    {
        $this->setDomain($domain->getDomain());
        $this->setClient($domain->getClient());
    }

    public function approve(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function reject(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }
}