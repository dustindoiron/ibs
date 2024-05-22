<?php

namespace IBS\Models;

use IBS\Models\Concerns\MakesRequests;
use IBS\Client;

class Account
{
    use MakesRequests;

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}