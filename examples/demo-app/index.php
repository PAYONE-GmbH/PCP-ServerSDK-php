<?php

require_once __DIR__ . '/vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

$config = new CommunicatorConfiguration("abc", "def", null, null, []);
$generator = new RequestHeaderGenerator($config);
$client = new CommerceCaseApiClient($generator);

print($client->getHostIndex());
