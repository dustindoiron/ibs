# ibs 💩

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
$response = $client->domain()->check('www.example.com');
```