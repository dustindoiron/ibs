<?php

namespace IBS\Models\Account;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Account as AccountBase;
use IBS\Transport\Response;

class Configuration
{
    use MakesRequests;

    public function __construct(AccountBase $account)
    {
        $this->setClient($account->getClient());
    }

    public function set(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            $parameters
        );
    }

    public function get(): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            []
        );
    }
}