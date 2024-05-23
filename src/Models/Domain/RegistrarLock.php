<?php

namespace IBS\Models\Domain;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Concerns\ManagesDomains;
use IBS\Transport\Response;
use IBS\Models\Domain as DomainBase;

class RegistrarLock
{
    use ManagesDomains;
    use MakesRequests;

    public function __construct(DomainBase $domain)
    {
        $this->setDomain($domain->getDomain());
        $this->setClient($domain->getClient());
    }

    public function enable(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function disable(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function status(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }}