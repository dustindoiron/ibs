<?php

namespace IBS\Models\Account;

use IBS\Models\Concerns\MakesRequests;
use IBS\Models\Account as AccountBase;
use IBS\Transport\Response;

class Balance
{
    use MakesRequests;

    public function __construct(AccountBase $account)
    {
        $this->setClient($account->getClient());
    }

    public function get(array $parameters = []): Response
    {
        return $this->makeRequest(
            self::getRequestMethod(__METHOD__),
            $parameters
        );
    }
}