<?php

namespace IBS\Models;

use IBS\Models\Domain\DnsRecord;
use IBS\Models\Domain\EmailForward;
use IBS\Models\Domain\Host;
use IBS\Models\Domain\PrivateWhois;
use IBS\Models\Domain\RegistrantVerification;
use IBS\Models\Domain\UrlForward;
use IBS\Models\Domain\TransferAway;
use IBS\Models\Domain\RegistrarLock;
use IBS\Models\Domain\Transfer;
use IBS\Transport\Response;
use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Concerns\ManagesDomains;
use IBS\Client;

class Domain
{
    use MakesRequests;
    use ManagesDomains;

    public function __construct(Client $client, string $domain = '')
    {
        if ($domain) {
            $this->setDomain($domain);
        }

        $this->setClient($client);
    }

    public function transfer(): Transfer
    {
        return new Transfer($this);
    }

    public function transferAway(): TransferAway
    {
        return new TransferAway($this);
    }

    public function registrarLock(): RegistrarLock
    {
        return new RegistrarLock($this);
    }

    public function dnsRecord(): DnsRecord
    {
        return new DnsRecord($this);
    }

    public function emailForward(): EmailForward
    {
        return new EmailForward($this);
    }

    public function host(): Host
    {
        return new Host($this);
    }

    public function privateWhois(): PrivateWhois
    {
        return new PrivateWhois($this);
    }

    public function registrantVerification(): RegistrantVerification
    {
        return new RegistrantVerification($this);
    }

    public function urlForward(): UrlForward
    {
        return new UrlForward($this);
    }

    public function check(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            ['Domain' => $this->getDomain()]
        );
    }

    public function create(array $parameters = []): Response
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

    public function trade(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function push(array $parameters = []): Response
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

    public function renew(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }

    public function restore(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            array_merge(['Domain' => $this->getDomain()], $parameters)
        );
    }
}