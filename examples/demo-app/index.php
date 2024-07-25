<?php

require_once __DIR__ . '/vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest;

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

$commerceCaseClient = new CommerceCaseApiClient($config);
$checkoutApiClient = new CheckoutApiClient($config);

$res = $commerceCaseClient->getCommerceCases($merchantId);
$commerceCase = $res[0];


$request = new CreateCheckoutRequest([
  'amountOfMoney' => [
    'amount' => 1200,
    'currencyCode' => 'EUR',
  ],
]);


$res = $checkoutApiClient->createCheckout($merchantId, $commerceCase->getCommerceCaseId(), $request);
$checkoutApiClient->deleteCheckout($merchantId, $commerceCase->getCommerceCaseId(), $res->getCheckoutId());
var_dump($res->jsonSerialize());
