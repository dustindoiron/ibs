<?php

namespace IBS\Models\Concerns;

trait ManagesDomains
{
    protected $domain;

    public function setDomain(string $domain)
    {
        $this->domain = $domain;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }
}