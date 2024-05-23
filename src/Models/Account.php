<?php

namespace IBS\Models;

use IBS\Models\Account\Balance;
use IBS\Models\Account\Configuration;
use IBS\Models\Account\DefaultCurrency;
use IBS\Models\Account\PriceList;
use IBS\Models\Concerns\MakesRequests;
use IBS\Client;

class Account
{
    use MakesRequests;

    protected $client;

    public function __construct(Client $client)
    {
        $this->setClient($client);
    }

    public function balance(): Balance
    {
        return new Balance($this);
    }

    public function configuration(): Configuration
    {
        return new Configuration($this);
    }

    public function defaultCurrency(): DefaultCurrency
    {
        return new DefaultCurrency($this);
    }

    public function priceList(): PriceList
    {
        return new PriceList($this);
    }
}