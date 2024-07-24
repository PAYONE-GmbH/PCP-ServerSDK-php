<?php

require_once __DIR__ . '/vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

// load your config
$key = getenv('API_KEY');
$secret = getenv('API_SECRET');
$merchantId = getenv('MERCHANT_ID');

$config = new CommunicatorConfiguration(
    apiKey: $key,
    apiSecret: $secret,
    host: CommunicatorConfiguration::getPredefinedHosts()['preprod']['url'],
    clientMetaInfo: []
);

$client = new CheckoutApiClient($config);

// get all commerce cases
$res = $client->getCheckouts($merchantId);
// do something with the result
var_dump($res);
