<?php

namespace IBS\Models\Concerns;

trait ManagesDomains
{
    protected string $domain;

    public function setDomain(string $domain)
    {
        $this->domain = $domain;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }
}