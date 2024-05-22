<?php

namespace IBS;

use IBS\Configuration;
use IBS\Models\Domain;
use IBS\Models\Account;

class Client
{
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->setConfiguration($configuration);
    }

    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function domain(string $domain = ''): Domain
    {
        return new Domain($this, $domain);
    }

    public function account(): Account
    {
        return new Account($this);
    }
}