<?php

require_once __DIR__ . '/vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

// load your config
$key = getenv('API_KEY');
$secret = getenv('API_SECRET');
$merchantId = getenv('MERCHANT_ID');

$config = new CommunicatorConfiguration(
    apiKeyId: $key,
    apiSecret: $secret,
    host: 'https://PAYONE_API_URL/',
    clientMetaInfo: []
);

$generator = new RequestHeaderGenerator($config);
$client = new CommerceCaseApiClient($generator, config: $config);

// get all commerce cases
$res = $client->getCommerceCases($merchantId);
// do something with the result
print_r($res);
