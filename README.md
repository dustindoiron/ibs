# IBS 💩

PHP client for internet.bs [API Reference](https://internetbs.net/internet-bs-api.pdf).

Install via composer `composer require dustindoiron/ibs`.

Example configuration:
```
$production_configuration = [
    'ApiKey' => 'your_api_key'
    'Password' => 'yep_its_a_password',
    'Endpoint' => 'https://api.internet.bs/', // default
];

$test_configuration = [
    'ApiKey' => 'your_api_key'
    'Password' => 'yep_its_a_password',
    'Endpoint' => 'https://testapi.internet.bs/',
];
```

Example usage:
```
$client = new \IBS\Client(\IBS\Configuration::createFromArray($production_configuration));
$client->domain('dustindoiron.com')->check()->getBodyAsArray();
= [
    "transactid" => "example_transaction_id",
    "status" => "UNAVAILABLE",
    "domain" => "dustindoiron.com",
    "minregperiod" => "1Y",
    "maxregperiod" => "10Y",
    "registrarlockallowed" => "YES",
    "privatewhoisallowed" => "YES",
    "realtimeregistration" => "YES",
    "price" => [
      "ispremium" => "NO",
    ],
  ]
```
Take a look at `IBS\Transport\Response` for available Response data.